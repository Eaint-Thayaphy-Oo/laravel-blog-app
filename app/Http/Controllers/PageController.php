<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //direct index
    public function index()
    {
        return 'home';
    }
}
