<?php

namespace App\Http\Livewire;

use App\Models\Conversation as ModelsConversation;
use Livewire\Component;

class Conversation extends Component
{
    public $conversation_id;

    public function render()
    {
        return view('livewire.conversation',[
            'conversation' => ModelsConversation::where('id', $this->conversation_id)->first()
        ]);
    }
}
