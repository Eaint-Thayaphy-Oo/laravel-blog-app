<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //show login page
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    //login page
    public function login(Request $request)
    {
        $cre = request()->only('email', 'password');
        $checkAuth = Auth::guard('admin')->attempt($cre);

        if (!$checkAuth) {
            return redirect()->back()->with('Wrong Email and Password');
        }
        return redirect('/admin')->with('success', 'Welcome' . auth()->guard('admin')->name);
    }

    //logout
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
