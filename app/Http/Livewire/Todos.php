<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $user_id;

    public function delete($todo_id){
        $check = Todo::where('id', $todo_id)->first();
        if(!empty($check)){
            $check->delete();
        }
    }

    public function render()
    {
        return view('livewire.todos', [
            'todos' => Todo::where('user_id', $this->user_id)->get() 
        ]);
    }
}
