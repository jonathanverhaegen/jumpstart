<?php

namespace App\Http\Livewire;

use App\Models\Todo as ModelsTodo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todo extends Component
{
    public $todo_id;

    public function check($id){

        $todo = ModelsTodo::where('id', $id)->first();

        if(!empty($todo)){
            $todo->delete();
        }

    }

    public function render()
    {
        return view('livewire.todo', [
            "todos" => ModelsTodo::where('user_id', Auth::id())->get()
        ]);
    }
}
