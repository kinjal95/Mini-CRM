<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function __construct() {
//        $this->middleware('admin', ['only' => ['Authenticate']]);
    }

    public function AdminLogin() {
        return view('auth.login');
    }

    public function Authenticate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            return redirect('company');
        } else {
            return back()->withErrors(['email' => 'You are not authenticate person.']);
        }
    }

    public function logout() {
        Auth::logout();
//        Session::flush();
        return redirect('/');
    }

}
