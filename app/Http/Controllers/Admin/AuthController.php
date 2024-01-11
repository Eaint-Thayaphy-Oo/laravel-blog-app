<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return $request->all();
    }
}
