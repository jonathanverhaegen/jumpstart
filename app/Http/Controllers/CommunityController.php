<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
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
        $data['posts'] = Post::where('group_id', $data['group']->id)->get();
        return view('community/detail', $data);
    }

    public function communityEdit(){
        $data['groups'] = Group::get();
        $data['usersgroups'] = UsersGroup::where('user_id', Auth::id())->orderByDesc('group_id')->get();
        return view('community/edit', $data);
    }

    public function addPost(Request $request){
        $credentials = $request->validate([
            'tekst' => 'required',
            'group_id' => 'required'
        ]);

        $request->flash();

        $text = $request->input('tekst');
        $group_id = $request->input('group_id');

        $post = new Post();
        $post->text = $text;
        $post->group_id = $group_id;
        $post->user_id = Auth::id();
        $post->save();

        $group = Group::where('id', $group_id)->first();

        $request->session()->flash('success', 'Je post is geplaatst');
        return redirect('/community/'.$group->name);
    }

}
