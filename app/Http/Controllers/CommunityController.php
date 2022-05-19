<?php

namespace App\Http\Controllers;

use App\Models\Group;
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

    public function communityDetail($id){
        $data['group_id'] = $id;
        return view('community/detail', $data);
    }
    public function communityEdit($id){
        $data['group_id'] = $id;
        return view('community/edit', $data);
    }
}
