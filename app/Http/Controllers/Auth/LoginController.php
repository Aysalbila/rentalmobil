<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //memanggil halaman login
    function index()
    {
        return view('pages.auth.login');
    }

    //memproses login
    function login(Request $request)
    {
        //memvalidasi inputan dari form
        $input = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        //mengecek data inputan dengan data di database, jika cocok login
        if(Auth::attempt($input)) {
            return redirect()->to('/merk');
        }
        else{
            return redirect()->back();
        }
        //mengalihkan ke halaman selanjutnya
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');

        
    }

}
