<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Instantie;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacten(){
        $data['instanties'] = Instantie::get();
        $data['agents'] = Agent::get();
        return view('contacten/contacten', $data);
    }

    public function contactenDetail($id){
        $data["agent"] = Agent::where('id', $id)->first();
        return view('contacten/detail', $data);
    }

    public function instantieDetail($id){
        $data['instanties'] = Instantie::where('id', $id)->get();
        $data['agents'] = Agent::where('instantie_id', $id)->get();
        return view('contacten/instantie', $data);
    }
}
