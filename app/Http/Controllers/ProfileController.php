<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function updateProfile(Request $request){
        $user = Auth::user();
        if(!empty($user->company)){
            $credentials = $request->validate([
                'naam' => 'required',
                'email' => 'required|email',
                'bedrijfsnaam' => 'required'
            ]);

            $user->name = $request->input('naam');
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');
            $user->save();

            $company = $user->company;
            $company->name = $request->input('bedrijfsnaam');
            $company->phone = $request->input('telefoon');
            $company->save();

            $request->session()->flash('success', 'Profiel is bijgewerkt');
            return redirect('/instellingen');
        }else{
            $credentials = $request->validate([
                'naam' => 'required',
                'email' => 'required|email',
            ]);

            $user->name = $request->input('naam');
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');
            $user->save();

            $request->session()->flash('success', 'Profiel is bijgewerkt');
            return redirect('/instellingen');
        }
    }

    public function updatePasswordView(){
        return view('instellingen/password');
    }

    public function updatePassword(Request $request){
        $credentials = $request->validate([
            'oud-wachtwoord' => 'required',
            'nieuw-wachtwoord' => 'required|confirmed|min:8'
        ]);

        $old = $request->input('oud-wachtwoord');
        $new = $request->input('nieuw-wachtwoord');
        

        if(Hash::check($old, Auth::user()->password)){
            $user = Auth::user();
            $user->password = Hash::make($new);
            $user->save();

            $request->session()->flash('success', 'Wachtwoord opgeslagen');
            return redirect('/instellingen/wachtwoord-wijzigen');

        }else{
            $request->session()->flash('error', 'Oud-wachtwoord is niet correct');
            return redirect('/instellingen/wachtwoord-wijzigen');
        }
    }

    public function profileDetail($id){
        $data['user'] = User::where('id', $id)->first();
        return view('dashboard/dashboardProfile', $data);
    }
}
