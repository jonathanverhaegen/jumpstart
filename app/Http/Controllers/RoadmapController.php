<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function roadmap(){
        //vanalles ophalen
        return view('roadmap/roadmap');
    }

    public function checkStage1(Request $request){
        //checken of gebruiker al mag checken

        //credentials checken

        //volgende stage opslaan

        //redirect en inform
    }
}
