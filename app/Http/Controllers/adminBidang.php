<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminBidang extends Controller
{
    public function index()
    {
        return view('bidang.dashboard');
    }
}
