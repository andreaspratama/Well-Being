<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SignController extends Controller
{
    // ADMIN
    public function index()
    {
        return view('pages.sign.index');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }

        return redirect()->route('indexLogin');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('dashboard');
    }

    // PIMPINAN
    public function indexPimpinan()
    {
        return view('pages.sign.indexPimpinan');
    }

    public function loginPimpinan(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboardPimpinan');
        }

        return redirect()->route('indexPimpinan');
    }

    public function logoutPimpinan()
    {
        Auth::logout();

        return redirect()->route('indexPimpinan');
    }
}
