<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiel/profiel');
    }

    public function editProfile(){
        $data['user'] = Auth::user();
        return view('profiel/edit', $data);
    }

    public function updateAvatar(Request $request){
        $credentials = $request->validate([
            'avatar' => 'required',
        ]);

        $avatar = $request->file('avatar');
        $imageSrc = time().'.'.$avatar->extension();
        $avatar->move(public_path('attachments'), $imageSrc);
        
        $user = User::where('id', Auth::id())->first();
        $user->avatar = $imageSrc;
        $user->save();

        $request->session()->flash('success', 'Avatar is geupdate');
        return redirect('/instellingen');

    }
}
