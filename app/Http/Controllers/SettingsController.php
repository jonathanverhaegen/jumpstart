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

    public function settingsStatuutStopzetten(){
        return view('instellingen/instellingenStatuutStopzetten');
    }
}