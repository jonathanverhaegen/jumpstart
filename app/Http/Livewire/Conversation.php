<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Conversation as ModelsConversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversation extends Component
{
    public $conversation_id;
    public $textChat;

    public function addChat($conversation_id){
        $chat = new Chat();
        $chat->text = $this->textChat;
        $chat->conversation_id = $conversation_id;
        $chat->read = 0;
        $chat->sender_id = Auth::id();
        $chat->save();

        $this->textChat = "";
    }

    public function render()
    {
        return view('livewire.conversation',[
            'conversation' => ModelsConversation::where('id', $this->conversation_id)->first()
        ]);
    }
}
