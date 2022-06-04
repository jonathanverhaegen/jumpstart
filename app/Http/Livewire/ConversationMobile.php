<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\AttachmentsChat;

class ConversationMobile extends Component
{
    use WithFileUploads;

    public $conversation_id;
    public $textChat;
    public $attachment;

    public function addChat($conversation_id){
        if (!empty($this->textChat)) {
            $chat = new Chat();
            $chat->text = $this->textChat;
            $chat->conversation_id = $conversation_id;
            $chat->read = 0;
            $chat->sender_id = Auth::id();
            $chat->save();

            if (!empty($this->attachment)) {
                $file = $this->attachment;
                $imageSrc = time().'.'.$file->extension();
                $this->attachment->storeAs('attachments', $imageSrc, 'real_public');

                //attachment opslaan in database
                $newAttach = new AttachmentsChat();
                $newAttach->name = $file->getClientOriginalName();
                $newAttach->source = $imageSrc;
                $newAttach->chat_id = $chat->id;
                $newAttach->save();
            }

            $this->textChat = "";
            $this->attachment = "";
        }
    }

    public function render()
    {
        return view('livewire.conversation-mobile', [
            'conversation' => Conversation::where('id', $this->conversation_id)->first()
        ]);
    }
}
