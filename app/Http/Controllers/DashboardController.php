<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        //users
        $data['user'] = Auth::user();

        //3 eerste chats
        $data['chats'] = Conversation::where('user_one', Auth::id())->orWhere('user_two', Auth::id())->orderByDesc('id')->skip(0)->take(3)->get();
        
        //todo's
        $data['todos'] = Todo::where('user_id', Auth::id())->get();

        
        return view('dashboard/dashboard', $data);
    }

    public function dashboardProfile(){
        $data['user'] = Auth::user();
        return view('dashboard/dashboardProfile', $data);
    }
}
