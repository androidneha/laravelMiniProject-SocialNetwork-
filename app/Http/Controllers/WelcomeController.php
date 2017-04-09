<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function getRedirectIfLoggedIn()
    {
        if(!Auth::check()) {
            return view('welcome');    
        }
        else
        {
            return redirect()->route('dashboard');
        }
        
    }
}
