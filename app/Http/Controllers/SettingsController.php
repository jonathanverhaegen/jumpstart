<?php

namespace App\Http\Controllers;

use App\Models\Stopinfo;
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

    public function settingsStatuutStopzetten2(Request $request){
        $check = Auth::user()->stopinfo;

        if(empty($check)){
            $stop = new Stopinfo();
            $stop->user_id = Auth::id();
            if(!empty($request->input('reason'))){
                $stop->reason = $request->input('reason');
            }
            $stop->save();
        }else{
            $stop = Auth::user()->stopinfo;
            $stop->reason = $request->input('reason');
            $stop->save();
        }
        

        return view('instellingen/instellingenStatuutStopzetten2');
    }

    public function settingsStatuutStopzetten3(Request $request){
        $stop = Auth::user()->stopinfo;
        if (!empty($request->input('reason'))) {
            $stop->why = $request->input('reason');
        }
        $stop->save();
        return view('instellingen/instellingenStatuutStopzetten3');
    }

    public function statuutStopzetten(Request $request){
        $credentials = $request->validate([
            'source' => 'required'
        ]);

        $source = $request->input('source');

        $stop = Auth::user()->stopinfo;
        if(!empty($request->input('reason'))){
        $stop->icecube = $request->input('reason');
        }
        $stop->save();

        if($source === "icecube"){
            $this->icecube();
        }else{
            $this->roadmap();
        }
    }

     function icecube(){
        dd('naar icecube');
    }

     function roadmap(){
        dd('naar roadmap');
    }
}