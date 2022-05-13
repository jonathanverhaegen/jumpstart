<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadmapController extends Controller
{
    public function roadmap(){
        $data['user'] = Auth::user();
        $data['roadmap'] = Auth::user()->roadmap;
        return view('roadmap/roadmap', $data);
    }

    public function checkIban(Request $request){
        $credentials = $request->validate([
            'iban' => 'required',
            'bank' => 'required',
        ]);

        $iban = $request->input('iban');
        $bank = $request->input('bank');

        //checken of de iban nummer klopt voor die bank
        switch($bank){
            case "ing":
                $check = true;
                break;
            case "kbc":
                $check = true;
                break;
            case "argenta":
                $check = true;
                break;
            case "belfius":
                $check = true;
                break;
        }

        if($check){
            dd('juist en mag dus door');
        }else{
            dd('fout en mag dus niet door');
        }
    }

    public function checkStage1(Request $request){
        //checken of gebruiker al mag checken
        $roadmap = Auth::user()->roadmap;
        if($roadmap->check === 0){
            $request->session()->flash('error', 'Je banknummer is nog niet gechecked');
            return redirect('/roadmap');
        }
        //credentials checken

        //volgende stage opslaan

        //redirect en inform
    }

    
}
