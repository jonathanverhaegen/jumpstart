<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function roadmap(){
        //vanalles ophalen
        return view('roadmap/roadmap');
    }
}
