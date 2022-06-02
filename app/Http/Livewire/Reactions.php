<?php

namespace App\Http\Livewire;

use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reactions extends Component
{
    public $post_id;
    public $newReaction;
    

    public function addReaction($post_id){
        $reaction = new Reaction();
        $reaction->user_id = Auth::id();
        $reaction->post_id = $post_id;
        $reaction->text = $this->newReaction;
        $reaction->save();

        $this->newReaction = "";
    }

    public function render()
    {
        return view('livewire.reactions',[
            'reactions' => Reaction::where('post_id', $this->post_id)->get()
        ]);
    }
}
