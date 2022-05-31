<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UsersGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function community(){
        $usersgroups = UsersGroup::where('user_id', Auth::id())->orderBy('group_id', 'asc')->get();
        foreach($usersgroups as $u){
            $groups[] = Group::where('id', $u->group_id)->first();
        }
        if(!isset($groups)){
            $groups = "";
        }
        $data['groups'] = $groups;
        return view('community/community', $data);
    }

    public function communityDetail($name){
        $data['group'] = Group::where('name', $name)->first();
        $usersgroups = UsersGroup::where('user_id', '!=', Auth::id())->get();
        foreach($usersgroups as $u){
            $users[] = User::where('id', $u->user_id)->first();
        }    
        $data['users'] = $users;
        $data['user'] = Auth::user(); 
        $data['faqs'] = $data['group']->faqs;
        return view('community/detail', $data);
    }

    public function communityEdit(){
        $data['groups'] = Group::get();
        $data['usersgroups'] = UsersGroup::where('user_id', Auth::id())->orderByDesc('group_id')->get();
        return view('community/edit', $data);
    }

}
