<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('menu');
    }

    public function index2()
    {
        return view('submenu');
    }

    public function index3()
    {
        return view("submenuAdd");
    }
}
