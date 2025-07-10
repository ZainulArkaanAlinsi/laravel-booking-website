<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek autentikasi
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Jika ADMIN
        if ($user->is_admin) {
            // Statistik pembayaran Down Payment
            $payments = Payment::where('status', 'Down Payment')->get();
            $totalAmount = $payments->sum('price');

            // Group pembayaran per bulan
            $paymentsPerMonth = $payments->groupBy(function ($payment) {
                return Carbon::parse($payment->created_at)->format('M');
            });

            $months = [];
            $count = [];
            $qty = [];

            foreach ($paymentsPerMonth as $month => $paymentGroup) {
                $months[] = $month;
                $count[$month] = $paymentGroup->sum('price');
                $qty[] = $paymentGroup->count();
            }

            $currentMonth = Carbon::now()->format('M');
            $monthCount = $count[$currentMonth] ?? 0;

            // Penanganan edge case bulan sebelumnya
            $currentMonthNumber = (int) Carbon::now()->format('m');
            $previousMonthNumber = $currentMonthNumber - 1;
            if ($previousMonthNumber < 1) {
                $previousMonthNumber = 12;
            }
            $previousMonth = Carbon::createFromDate(null, $previousMonthNumber)->format('M');
            $countPreviousMonth = $count[$previousMonth] ?? 0;

            $percentage = $countPreviousMonth > 0 ? ($monthCount / $countPreviousMonth) * 100 : 0;

            $kiri = 0;
            $kanan = 0;
            if ($percentage > 100) {
                $kiri = 100 / $percentage * 100;
                $kanan = ($percentage - 100) / $percentage * 100;
            } elseif ($percentage == 0) {
                $kiri = 0;
                $kanan = 0;
            }

            $transactionCount = Transaction::where('status', 'Reservation')->count();

            // Kirim data admin ke view
            return view('dashboard.index', compact(
                'transactionCount',
                'kiri',
                'kanan',
                'qty',
                'totalAmount',
                'months',
                'count',
                'monthCount',
                'percentage'
            ));
        }

        // Jika USER BIASA
        $customer = $user->Customer;
        $totalPaid = $customer ? $customer->Payments()->where('status', 'Paid')->sum('price') : 0;
        $myBookings = $customer ? $customer->Transactions()->latest()->take(5)->get() : collect();

        // Kirim data user ke view
        return view('dashboard.index', compact('totalPaid', 'myBookings'));
    }

    public function notifiable(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        // Tambahkan logic notifikasi sesuai kebutuhan Anda
        return redirect('/dashboard/order');
    }

    public function markall()
    {
        $notif = Notifications::where('status', 'unread')->get();
        foreach ($notif as $n) {
            $n->status = 'read';
            $n->read_at = Carbon::now();
            $n->save();
        }
        Alert::success('Success', 'Notif Telah Terbaca!');
        return redirect('/dashboard/order');
    }
}
