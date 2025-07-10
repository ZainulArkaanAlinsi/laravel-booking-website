<?php

namespace App\Http\Controllers;

use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\NewRoomReservationDownPayment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting: gunakan facade Auth!
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Cek autentikasi user
        if (!Auth::check()) {
            Alert::error('Please Login First!');
            return redirect('/login');
        }

        $stayfrom = Carbon::parse($request->from);
        $stayuntil = Carbon::parse($request->to);
        $room = Room::where('id', $request->room)->first();

        // Cek ketersediaan kamar
        $cektransaksi = Transaction::where('room_id', $request->room)
            ->where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayuntil]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayuntil]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayuntil]])
            ->get();

        if ($cektransaksi->count() > 0) {
            Alert::error('Kamar Tidak Tersedia');
            return back();
        }

        // Ambil data customer
        if ($request->customer == null) {
            $auth = Auth::user()->Customer->id;
            $customer = Customer::where('id', $auth)->first();
        } else {
            $customer = Customer::where('id', $request->customer)->first();
        }

        $price = $room->price;
        $dayDifference = $stayfrom->diffInDays($stayuntil);
        $total = $price * $dayDifference;

        // Exclude metode pembayaran tertentu (misal: id 1)
        $paymentmethodnotid = [1];
        $paymentmet = PaymentMethod::whereNotIn('id', $paymentmethodnotid)->get();

        return view('frontend.order', compact('customer', 'room', 'stayfrom', 'dayDifference', 'stayuntil', 'total', 'paymentmet'));
    }

    public function order(Request $request)
    {
        $rooms = Room::where('id', $request->room)->first();
        $customers = Customer::where('id', $request->customer)->first();

        // Cek transaksi apakah kamar sudah dibooking
        $stayfrom = Carbon::parse($request->check_in);
        $stayuntil = Carbon::parse($request->check_out);
        $cektransaksi = Transaction::where('room_id', $request->room)
            ->where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayuntil]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayuntil]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayuntil]])
            ->get();

        if ($cektransaksi->count() > 0) {
            Alert::error('Kamar Tidak Tersedia');
            return back();
        }

        if ($customers->nik == null) {
            Alert::error('Kesalahan Data', 'Mohon Isi Data NIK');
            return redirect('myaccount');
        }

        $transaction = $this->storetransaction($request, $rooms);
        $status = 'Pending';
        $payment = $this->storepayment($request, $transaction, $status);

        // Notifikasi ke admin
        $superAdmins = User::where('is_admin', 1)->get();
        foreach ($superAdmins as $superAdmin) {
            $message = 'Reservation added by ' . $customers->name;
            event(new NewReservationEvent($message, $superAdmin));
            $superAdmin->notify(new NewRoomReservationDownPayment($transaction, $payment));
        }
        event(new RefreshDashboardEvent("Someone reserved a room"));

        $inv = Payment::where('c_id', $request->customer)->orderBy('id', 'desc')->first();
        Alert::success('Thanks!', 'Room ' . $rooms->no . ' Has been reservated. Please Pay now!');
        return redirect('/bayar/' . $inv->Transaction->id);
    }

    public function invoice($id)
    {
        $p = Payment::where('id', $id)->with('Customer', 'Transaction', 'Methode')->first();
        if ($p->status == 'Pending') {
            return abort(404);
        }
        return view('frontend.invoice', compact('p'));
    }

    public function pembayaran($id)
    {
        $t = Transaction::findOrFail($id);
        $pmi = [1];
        $pay = $t->Payments->whereNotIn('payment_method_id', $pmi)->first();
        if ($pay->status == 'Pending' && $pay->image != null) {
            return back();
        }
        $price = Room::where('id', $t->Room->id)->first()->price;
        return view('frontend.bayar', compact('t', 'price', 'pay'));
    }

    public function bayar(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file|max:3072', // 3MB max
        ]);
        if ($request->file('image')) {
            $image = $request->file('image')->store('bukti-images', 'public');
        }
        $payment = Payment::findOrFail($request->id);
        $payment->update([
            'image' => $image,
        ]);
        Alert::success('Pembayaran Berhasil', 'Tunggu Konfirmasi!');
        return redirect('/history');
    }

    private function storetransaction($request, $rooms)
    {
        return Transaction::create([
            'room_id' => $rooms->id,
            'c_id' => $request->customer,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'Reservation'
        ]);
    }

    private function storepayment($request, $transaction, string $status)
    {
        $price = $request->price;
        $count = Payment::count() + 1;
        return Payment::create([
            'c_id' => $request->customer,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'status' => $status,
            'payment_method_id' => $request->payment_method_id,
            'invoice' =>  '0' . $request->customer . 'INV' . $count . Str::random(4)
        ]);
    }
}
