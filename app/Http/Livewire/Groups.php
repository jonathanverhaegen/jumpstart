<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\UsersGroup;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Groups extends Component
{
    public $group_id;
    
    
    public function add($id){
        $check = UsersGroup::where('group_id', $id)->where('user_id', Auth::id())->first();
        if(empty($check)){
            $usersgroup = new UsersGroup();
            $usersgroup->user_id = Auth::id();
            $usersgroup->group_id = $id;
            $usersgroup->save();
        }
    }

    public function delete($id){
        $usersgroup = UsersGroup::where('group_id', $id)->where('user_id', Auth::id())->first();
        $usersgroup->delete();
    }

    public function render()
    {
        return view('livewire.groups', [
            'group' => Group::where('id', $this->group_id)->first(),
            'usersgroups' => UsersGroup::where('user_id', Auth::id())->where('group_id', $this->group_id)->get(),
        ]);
    }
}
