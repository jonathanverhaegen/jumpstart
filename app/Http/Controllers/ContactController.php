<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Instantie;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacten(){
        $data['instanties'] = Instantie::get();
        $data['agents'] = User::where('isAgent', 1)->get();
        return view('contacten/contacten', $data);
    }

    public function contactenDetail($id){
        $data["agent"] = User::where('id', $id)->where('isAgent', 1)->first();
        
        return view('contacten/detail', $data);
    }

    public function instantieDetail($id){
        $data['instanties'] = Instantie::where('id', $id)->get();
        $users = User::where('isAgent', 1)->get();

        if($id === "4"){
            $users = User::where('isAgent', 0)->get();

            foreach($users as $u){
                if(!empty($u->roadmap)){
                    $agents[] = $u;
                }
            }

            $data['agents'] = $agents;
            return view('contacten/instantie', $data);
        }

        foreach($users as $u){
            if($u->agent->instantie_id === intval($id)){
                $agents[] = $u;
            }
        }
        if(empty($agents)){
            $agents = "";
        }
        $data['agents'] = $agents;
        return view('contacten/instantie', $data);
    }
}
