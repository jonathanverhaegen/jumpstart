<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function signupStudent(){
        return view('signupStudent');
    }

    public function signupZelfstandige(){
        return view('signupZelfstandige');
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

    public function addStudent(Request $request){
        //checking
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'birthdate' => 'required|before:today',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);


        //enkel user added als het een thomasmore account is
        $inputEmail = $request->input('email');
        $explodeEmail = explode('@', $inputEmail);
        if(str_contains($explodeEmail[1], "thomasmore.be") === false){
            $request->session()->flash('error', 'Je ingegeven email is geen thomasmore email');
            return redirect('/signup');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->birth_date = $request->input('birthdate');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->save();

        //add roadmap
        $map = new Roadmap();
        $map->user_id = $user->id;
        $map->stage = 1;
        $map->check = 0;
        $map->save();

        $request->session()->flash('success', 'Je account is aangemaakt');
        return redirect('/login');
    }

    public function addZelfstandige(Request $request){
       //add student + company
       dd('add student-zelfstandige');
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
