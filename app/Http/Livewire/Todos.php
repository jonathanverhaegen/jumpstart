<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $user_id;

    public $toggle = 0;

    public function delete($todo_id){
        $check = Todo::where('id', $todo_id)->first();
        if(!empty($check)){
            $check->delete();
        }
    }

    public function on(){
        $this->toggle = 1;
    }

    public function off(){
        $this->toggle = 0;
    }

    public function render()
    {   
        if($this->toggle === 0){
            return view('livewire.todos', [
                'todos' => Todo::where('user_id', $this->user_id)->get(),
                'toggle'  => "0"
            ]);
        }

        if($this->toggle === 1){
            return view('livewire.todos', [
                'todos' => Todo::where('user_id', $this->user_id)->where('type', 'overheid')->get(),
                'toggle' => "1"
            ]);
        }
        
    }
}
