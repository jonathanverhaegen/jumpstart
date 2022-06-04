<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings(){
        return view('instellingen/instellingen');
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