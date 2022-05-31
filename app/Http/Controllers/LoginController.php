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

    public function homepage(){
        return view('homepage');
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

        $explodeEmail = explode('@', $request->input('email'));
        if(str_contains($explodeEmail[1], "thomasmore.be") === false){
            $request->session()->flash('error', 'Je ingegeven email is geen thomasmore email');
            return redirect('/login');
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('./dashboard');
        }else{
            $request->flash();
            $request->session()->flash('error', 'Email en wachtwoord matchen niet');
            return redirect('login');
        }
    }
}
