<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteDashboardController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard');
    }
}