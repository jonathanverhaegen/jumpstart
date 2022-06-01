<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $post_id;

    public function add($post_id){
        $like = new Like();
        $like->post_id = $post_id;
        $like->user_id = Auth::id();
        $like->save();
    }

    public function delete($post_id){
        $like = Like::where('post_id', $post_id)->where('user_id', Auth::id())->first();
        $like->delete();
    }

    public function render()
    {
        return view('livewire.likes',[
            'like' => Like::where('post_id', $this->post_id)->where('user_id', Auth::id())->first()
        ]);
    }
}
