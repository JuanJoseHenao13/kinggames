<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        session(['welcome_user' => auth()->user()->nombre]);

        if (auth()->user()->rol === 'cliente') {
            return route('cliente.dashboard');
        }

        return '/admin'; // or home for others
    }

    /**
     * Create a new controller instance.    
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
