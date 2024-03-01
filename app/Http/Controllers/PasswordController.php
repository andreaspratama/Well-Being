<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    public function index()
    {
        return view('pages.sign.pass');
    }

    public function gantiPassPros(Request $request)
    {
        // cek password lama
        if(!Hash::check($request->pass_lama, auth()->user()->password)) {
            return back()->with('error', 'password lama kamu salah, perbaiki dulu yaa');
        }
        // cek password baru dan ulang
        if($request->pass_baru != $request->pass_ulang) {
            return back()->with('error', 'password tidak sama, coba ulangi password baru yaa');
        }

        auth()->user()->update([
            'password' => bcrypt($request->pass_baru)
        ]);

        return redirect()->route('gantiPass')->with('success', 'Password Berhasil Diubah');
    }
}
