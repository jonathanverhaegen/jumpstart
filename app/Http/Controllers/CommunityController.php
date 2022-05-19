<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function community(){
        $usersgroups = Auth::user()->usersgroups;
        foreach($usersgroups as $u){
            $groups[] = Group::where('id', $u->group_id)->first();
        }
        $data['groups'] = $groups;
        return view('community/community', $data);
    }

    public function communityDetail($name){
        $data['group'] = Group::where('name', $name)->first();
        $usersgroups = $data['group']->usersgroups;
        foreach($usersgroups as $u){
            $users[] = User::where('id', $u->user_id)->first();
        }    
        $data['users'] = $users;  
        $data['faqs'] = $data['group']->faqs;
        return view('community/detail', $data);
    }

    public function communityEdit($id){
        $data['group_id'] = $id;
        return view('community/edit', $data);
    }

    public function addFaq(Request $request){
        
    }
}
