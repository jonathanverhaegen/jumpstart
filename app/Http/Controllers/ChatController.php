<?php

namespace App\Http\Controllers;

use App\Models\AttachmentsChat;
use App\Models\Chat;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat(Request $request){
        $data['user'] = Auth::user();
        $data['conversations'] = Conversation::where('user_one', Auth::id())->orWhere('user_two', Auth::id())->orderByDesc('id')->get();
        
        $conversation_id = $request->input('chat');
        if(!empty($conversation_id)){
            $data['conversation_id'] = intval($conversation_id);
            $conversation = Conversation::where('id', $conversation_id)->first();
            $chat = Chat::where('conversation_id', $conversation_id)->orderByDesc('id')->first();
            
            if($conversation->user_one !== Auth::id() && $conversation->user_two !== Auth::id()){
                abort(403);
            }

            $chat->read = 1;
            $chat->save();
        }else{
            $data['conversation_id'] = "";
        }
        
        return view('chat/chat', $data);
    }

    public function addChatView($user_id){
        $data['user_id'] = $user_id;
        $data['user'] = User::where('id', $user_id)->first();
        return view('chat/chatAdd', $data);
    }

    public function addChat(Request $request){
        $credentials = $request->validate([
            'tekst' => 'required',
            'reciever_id' => 'required',
        ]);

        $text = $request->input('tekst');
        $reciever_id =$request->input('reciever_id');

        //add conversation
        $convo = Conversation::where('user_one', $reciever_id)->orWhere('user_two', $reciever_id)->first();
        
        if(empty($convo)){
            $convo = new Conversation();
            $convo->user_one = Auth::id();
            $convo->user_two = $reciever_id;
            $convo->start = 0;
            $convo->save();
        }

        //add chat
        $chat = new Chat();
        $chat->conversation_id = $convo->id;
        $chat->sender_id = Auth::id();
        $chat->text = $text;
        $chat->read = 0;
        $chat->save();

        //add attachments chat
        if(!empty($request->file('file'))){
                $file = $request->file('file');
                $imageSrc = time().'.'.$file->extension();
                $file->move(public_path('attachments'), $imageSrc);

                //attachment opslaan in database
                $newAttach = new AttachmentsChat();
                $newAttach->name = $file->getClientOriginalName();
                $newAttach->source = $imageSrc;
                $newAttach->chat_id = $chat->id;
                $newAttach->save();
                sleep(1);
        }

        return redirect('/chat?chat='. $convo->id);




    }

    public function mobileChat($conversation_id){
        $data['user'] = Auth::user();
        $data['conversations'] = Conversation::where('user_one', Auth::id())->orWhere('user_two', Auth::id())->orderByDesc('id')->get();
        $conversation = Conversation::where('id', $conversation_id)->first();
        if($conversation->user_one !== Auth::id() && $conversation->user_two !== Auth::id()){
            abort(403);
        }
        $data['conversation_id'] = $conversation_id;
        return view('chat/chatMobile', $data);
    }

}
