<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function signupStudent(){
        return view('signupStudent');
    }

    public function signupZelfstandige(){
        return view('signupZelfstandige');
    }

    public function addStudentQR(Request $request){
        //checking
        $credentials = $request->validate([
            'naam' => 'required|max:255',
            'geboortedatum' => 'required|before:today',
            'email' => 'required|email',
            'wachtwoord' => 'required|confirmed|min:8'
        ]);

        $request->flash();
        
         // Initialise the 2FA class
         $google2fa = app('pragmarx.google2fa');

         // Save the registration data in an array
         $registration_data = $request->all();

         // Add the secret key to the registration data
         $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

         // Save the registration data to the user session for just the next request
         $request->session()->flash('registration_data', $registration_data);

         // Generate the QR image. This is the image the user will scan with their app
      // to set up two factor authentication
         $QR_Image = $google2fa->getQRCodeInline(
             config('jumpstart.test'),
             $registration_data['email'],
             $registration_data['google2fa_secret']
         );

         

         // Pass the QR barcode image to our view
         return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    }

    public function addZelfstandige(Request $request){
        //add student + company
        dd('add student-zelfstandige');
     }

     public function completeRegistration(Request $request)
      {   

          // add the session data back to the request input
          $request->merge(session('registration_data'));

          // Call the default laravel authentication
          return $this->addStudent($request);
      }

     public function addStudent($request){
        
        //enkel user added als het een thomasmore account is
        $inputEmail = $request->input('email');
        $explodeEmail = explode('@', $inputEmail);
        if(str_contains($explodeEmail[1], "thomasmore.be") === false){
            $request->session()->flash('error', 'Je ingegeven email is geen thomasmore email');
            return redirect('/signup');
        }

        $user = new User();
        $user->name = $request->input('naam');
        $user->birth_date = $request->input('geboortedatum');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('wachtwoord'));
        $user->bio = $request->input('bio');
        $user->google2fa_secret = $request->input('google2fa_secret');
        $user->save();

        //add roadmap
        $map = new Roadmap();
        $map->user_id = $user->id;
        $map->stage = 1;
        $map->check = 0;
        $map->save();

        // event(new Registered($user));

        $request->session()->flash('success', 'Je account is aangemaakt. Je hebt een email gekregen om je emailadres te verifieren');
        return redirect('/login');
        
     }
}
