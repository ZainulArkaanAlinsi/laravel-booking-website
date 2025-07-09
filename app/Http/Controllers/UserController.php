<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        if (Auth::user()->is_admin == 0) {
            abort(404);
        }
        $user = User::where('is_admin', 0)->get();
        $p = $user->count();
        return view('dashboard.user.index', compact('p', 'user'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        if (Auth::user()->is_admin == 0) {
            abort(404);
        }
        return view('dashboard.user.create');
    }

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'telp' => 'nullable|numeric',
            'birthdate' => 'nullable',
            'jk' => 'required',
            'job' => 'nullable',
            'address' => 'nullable',
            'image' => 'nullable',
            'is_admin' => 'nullable'
        ]);
        if ($request->file('image')) {
            $image = $validatedData['image'] = $request->file('image')->store('user-images');
        } else {
            $image = null;
        }
        $cus = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate' => $request->birthdate,
        ]);
        User::create([
            'c_id' => $cus->id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'image' => $image,
            'is_admin' => $request->is_admin
        ]);
        return redirect('/dashboard/user')->with('success', 'Data berhasil dibuat');
    }

    public function edit(User $user)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        if (Auth::user()->is_admin == 0) {
            abort(404);
        }
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $p = User::findOrFail($request->id);
        $c = Customer::findOrFail($p->Customer->id);

        $request->validate([
            'name' => 'nullable',
            'username' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'address' => 'nullable',
            'jk' => 'nullable',
            'job' => 'nullable',
            'birthdate' => 'nullable',
            'card_number' => 'nullable',
        ]);
        $c->update([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate' => $request->birthdate
        ]);
        $p->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'card_number' => $request->card_number,
        ]);
        return redirect('/dashboard/user')->with('success', 'Data berhasil di edit');
    }

    public function updatefront(Request $request, $id)
    {
        $p = User::findOrFail($id);
        $c = Customer::findOrFail($p->Customer->id);

        if ($request->newpassword) {
            $request->validate(['newpassword' => 'min:3']);
            if ($request->confirmation != $request->newpassword) {
                return redirect('/myaccount')->with('error', 'Password Tidak Sama!');
            }
            $p->update(['password' => bcrypt($request->newpassword)]);
        } else {
            $request->validate([
                'name' => 'nullable',
                'username' => 'nullable',
                'email' => 'nullable',
                'telp' => 'nullable',
                'address' => 'nullable',
                'jk' => 'nullable',
                'job' => 'nullable',
                'birthdate' => 'nullable',
                'card_number' => 'nullable',
                'nik' => 'nullable'
            ]);
            $c->update([
                'name' => $request->name,
                'address' => $request->address,
                'jk' => $request->jk,
                'job' => $request->job,
                'birthdate' => $request->birthdate,
                'nik' => $request->nik,
            ]);
            $p->update([
                'username' => $request->username,
                'email' => $request->email,
                'telp' => $request->telp,
                'card_number' => $request->card_number,
            ]);
        }
        return redirect('/myaccount')->with('success', 'Data berhasil di edit');
    }

    public function delete($id)
    {
        $p = User::findOrFail($id);
        $p->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function profile()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function cusedit()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function cusfoto(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file',
        ]);
        if ($request->file('image')) {
            $image = $validatedData['image'] = $request->file('image')->store('user-images', 'public');
        }
        $user = User::findOrFail($request->id);
        $user->update([
            'image' => $image
        ]);
        return back()->with('success', 'Image berhasil diupdate!');
    }

    public function delfoto($id)
    {
        $user = User::findOrFail($id);
        $image = $user->image;
        $path  = storage_path() . "/app/public/" . $image;
        if (File::exists($path)) {
            unlink($path);
        }
        $user->update([
            'image' => null
        ]);
        return back()->with('success', 'Image berhasil dihapus!');
    }

    public function history()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        $id = Auth::user()->Customer->id;
        $user = Auth::user();
        $not = [1];
        $his = Payment::where('c_id', $id)->orderby('id', 'desc')->wherenotin('payment_method_id', $not)->paginate(10);
        return view('user.history', compact('his', 'user'));
    }
}
