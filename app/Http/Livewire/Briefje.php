<?php

namespace App\Http\Livewire;

use App\Models\Briefje as ModelBriefje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Briefje extends Component
{
    public function deleteActivity($id){
        $briefje = ModelBriefje::where('id', $id)->first();
        $briefje->delete();
    }

    public function render()
    {
        return view('livewire.briefje', [
            'activities' => ModelBriefje::where('user_id', Auth::id())->get()
        ]);
        
    }
}
