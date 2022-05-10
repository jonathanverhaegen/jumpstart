<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signup(){
        return view('signup');
    }

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

    public function addUser(Request $request){
        //checking
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'birthdate' => 'required|before:today',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->birth_date = $request->input('birthdate');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->save();

        $request->session()->flash('success', 'Je account is aangemaakt');
        return redirect('/login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('./dashboard');
        }else{
            // $data['error'] = "Email and password do not match";
            $request->flash();
            $request->session()->flash('error', 'Email and password do not match');
            return redirect('login');
        }
    }
}
