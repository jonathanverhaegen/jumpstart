<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function roadmap(){
        return view('roadmap/roadmap');
    }
}
