<?php

namespace App\Http\Livewire;

use App\Models\Briefje;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddBriefje extends Component
{
    public function add($id){
        $briefje = new Briefje();
        $briefje->user_id = Auth::id();
        $briefje->activity_id = $id;
        $briefje->save();
    }

    public function render()
    {
        return view('livewire.add-briefje', [
            'categories' => Category::get()
        ]);
    }
}
