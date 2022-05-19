<?php

namespace App\Http\Controllers;

use App\Models\Instantie;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacten(){
        $data['instanties'] = Instantie::get();
        return view('contacten/contacten', $data);
    }

    public function contactenDetail($id){
        $data["contact_id"] = $id;
        return view('contacten/detail', $data);
    }
}
