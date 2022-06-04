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

    public function settingsMobile(){
        return view('instellingen/instellingenMobiel');
    }

    public function settingsStatuutStopzetten1(){
        return view('instellingen/instellingenStatuutStopzetten1');
    }

    public function settingsStatuutStopzetten2(){
        return view('instellingen/instellingenStatuutStopzetten2');
    }

    public function settingsStatuutStopzetten3(){
        return view('instellingen/instellingenStatuutStopzetten3');
    }
}