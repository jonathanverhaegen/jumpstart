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

   

    public static function makeDummyTodo($user_id){
        
        $todo1 = new Todo();
        $todo1->title = "Personenbelasting";
        $todo1->text = "Deadline indienen personenbelasting";
        $todo1->type = "overheid";
        $todo1->user_id = $user_id;
        $todo1->save();

        $todo2 = new Todo();
        $todo2->title = "Klantenlisting";
        $todo2->text = "Deadline indienen klantenlisting btw";
        $todo2->type = "overheid";
        $todo2->user_id = $user_id;
        $todo2->save();

        $todo3 = new Todo();
        $todo3->title = "Provinciebelasting Antwerpen";
        $todo3->text = "Deadline indienen aangifte provinciebelasting Antwerpen";
        $todo3->type = "overheid";
        $todo3->user_id = $user_id;
        $todo3->save();

        $todo4 = new Todo();
        $todo4->title = "Ice Cube";
        $todo4->text = "Een workshop rond de branding van je bedrijf";
        $todo4->type = "normal";
        $todo4->user_id = $user_id;
        $todo4->save();
    }
}
