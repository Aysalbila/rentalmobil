<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    function index()
    {
        return view('pages.auth.register');
    }

    function register(Request $request)
    {
        $validatedUser = $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'contact'=> 'required',
            'password'=> 'required'
        ]);
        //simpan ke data base
        $userData = new User;
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->contact = $request->contact;
        $userData->password = bcrypt($request->password);
        $userData->save();

        return redirect()->to('/login')->with('success', 'Berhasil register');
    }
}
