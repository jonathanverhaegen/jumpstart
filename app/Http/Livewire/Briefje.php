<?php

namespace App\Http\Livewire;

use App\Models\Briefje as ModelBriefje;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Briefje extends Component
{
    public function deleteActivity($id){
        $briefje = ModelBriefje::where('id', $id)->first();
        $briefje->delete();
    }

    public function add($id){
        $check = ModelBriefje::where('activity_id', $id)->where('user_id', Auth::id())->first();

        if(!empty($check)){
            $briefje = new ModelBriefje();
            $briefje->user_id = Auth::id();
            $briefje->activity_id = $id;
            $briefje->save();
        }
        
    }

    public function render()
    {
        return view('livewire.briefje', [
            'activities' => ModelBriefje::where('user_id', Auth::id())->get(),
            'categories' => Category::get()
        ]);
    }
}
