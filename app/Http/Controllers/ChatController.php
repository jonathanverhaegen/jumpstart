<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat(){
        $data['user'] = Auth::user();
        $data['chats'] = "test";
        dd($data['chats']);
        return view('chat/chat', $data);
    }
}
