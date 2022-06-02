<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat(Request $request){
        $data['user'] = Auth::user();
        $data['conversations'] = Conversation::where('user_one', Auth::id())->orWhere('user_two', Auth::id())->get();
        
        $conversation_id = $request->input('chat');
        if(!empty($conversation_id)){
            $data['conversation_id'] = $conversation_id;
        }
        
        return view('chat/chat', $data);
    }
}
