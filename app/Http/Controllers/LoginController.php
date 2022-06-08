<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Google2FA;

class LoginController extends Controller
{
    public function login(){
        return view('/login');
    }


    public function logout(){
        Auth::logout();
        
        return redirect('./login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('./dashboard');
        }else{
            $request->flash();
            $request->session()->flash('error', 'Email en wachtwoord matchen niet');
            return redirect('login');
        }
    }
}
