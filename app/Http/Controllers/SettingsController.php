<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function settings(){
        $data['user'] = Auth::user();
        return view('instellingen/instellingen', $data);
    }
}
