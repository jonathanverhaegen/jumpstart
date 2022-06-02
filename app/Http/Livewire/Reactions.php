<?php

namespace App\Http\Livewire;

use App\Models\AttachmentsReaction;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Reactions extends Component
{
    use WithFileUploads;
    
    public $post_id;
    public $newReaction;
    public $attachment;
    

    public function addReaction($post_id){
        if(!empty($this->newReaction)){
            $reaction = new Reaction();
            $reaction->user_id = Auth::id();
            $reaction->post_id = $post_id;
            $reaction->text = $this->newReaction;
            $reaction->save();

            if(!empty($this->attachment)){
                $file = $this->attachment;
                $imageSrc = time().'.'.$file->extension();
                $this->attachment->storeAs('attachments', $imageSrc, 'real_public');

                //attachment opslaan in database
                $newAttach = new AttachmentsReaction();
                $newAttach->name = $file->getClientOriginalName();
                $newAttach->source = $imageSrc;
                $newAttach->reaction_id = $reaction->id;
                $newAttach->save();
            }

            $this->newReaction = "";
            $this->attachment = "";
        }
        
    }

    public function delete($reaction_id){
        $reaction = Reaction::where('id', $reaction_id)->first();
        if(!empty($reaction)){
            $reaction->delete();
        }

    }

    public function render()
    {
        return view('livewire.reactions',[
            'reactions' => Reaction::where('post_id', $this->post_id)->get()
        ]);
    }
}
