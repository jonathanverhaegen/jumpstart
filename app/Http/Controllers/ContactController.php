<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacten(){
        return view('contacten/contacten');
    }
}
