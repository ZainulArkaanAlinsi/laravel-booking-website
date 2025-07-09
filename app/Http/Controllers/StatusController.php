<?php

namespace App\Http\Controllers;

use App\Models\RoomStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{

    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $status = RoomStatus::orderBy('id','desc')->get();
        $p = $status->count();
        // dd($p);
        return view('dashboard.status.index', compact('p','status'));
    }

    public function create(){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.status.create');
    }

    public function post(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'info' => 'required'
        ]);

        RoomStatus::create([
            'name' => $request->name,
            'code' => $request->code,
            'info' => $request->info
        ]);

        Alert::success('Success', 'Data berhasil Ditambahkan');
        return redirect('/dashboard/data/status');
    }

    public function edit($id){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $status = RoomStatus::findOrFail($id);
        return view('dashboard.status.edit', compact('status'));
    }

    public function update(Request $request, $id){
        $p = RoomStatus::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data berhasil Diedit');
        return redirect('/dashboard/data/status');
    }

    public  function delete($id){
        $p = RoomStatus::findOrFail($id);
        $p->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return back();
    }
}
