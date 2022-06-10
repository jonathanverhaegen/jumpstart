<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Roadmap;
use App\Models\Todo;
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

    public function signupZelfstandigeKbo(){
        return view('signupZelfstandigeKbo');
    }

    public function signupZelfstandigeProfile(){
        return view('signupZelfstandigeProfile');
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

        if(!empty($request->file('avatar'))){
            $file = $request->file('avatar');
            $imageSrc = time().'.'.$file->extension();
            $file->move(public_path('attachments'), $imageSrc);
            $fileName = $imageSrc;
        }
        
         // Initialise the 2FA class
         $google2fa = app('pragmarx.google2fa');

         // Save the registration data in an array
         if(!empty($fileName)){
            $registration_data = [
                'naam' => $request->input('naam'), 
                'geboortedatum' => $request->input('geboortedatum'), 
                'email' => $request->input('email'), 
                'wachtwoord' => $request->input('wachtwoord'),
                'fileName' => $fileName
            ];
         }else{
            $registration_data = [
                'naam' => $request->input('naam'), 
                'geboortedatum' => $request->input('geboortedatum'), 
                'email' => $request->input('email'), 
                'wachtwoord' => $request->input('wachtwoord')
            ];
         }
         

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
            return redirect('/signup/student');
        }

        $user = new User();
        $user->name = $request->input('naam');
        $user->birth_date = $request->input('geboortedatum');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('wachtwoord'));
        $user->bio = $request->input('bio');
        $user->google2fa_secret = $request->input('google2fa_secret');
        if(!empty($request->input('fileName'))){
            $user->avatar = $request->input('fileName');
        }

        $user->save();

        //add roadmap
        $map = new Roadmap();
        $map->user_id = $user->id;
        $map->stage = 1;
        $map->check = 0;
        $map->save();

        //add todo
        DashboardController::makeDummyTodo($user->id);

        //dummy chat
        ChatController::makeDummyChats($user->id);

        event(new Registered($user));

        auth()->login($user);

        $request->session()->flash('success', 'Je account is aangemaakt. Je hebt een email gekregen om je emailadres te verifieren');
        return redirect('/login');
        
     }


     

    public function addZelfstandigeQR(Request $request){
        $credentials = $request->validate([
            'naam' => 'required|max:255',
            'geboortedatum' => 'required|before:today',
            'email' => 'required|email|unique:users,email',
            'wachtwoord' => 'required|confirmed|min:8',
            'bedrijfsnaam' => 'required|max:255',
            'ondernemingsnummer' => 'required',
            'bedrijfsemail' => 'required|email|unique:companies,email',
            'telefoon' => 'required',
            'opstartdatum' => 'required|before:today',
            'bio' => 'required'
        ]);
        
        $request->flash();

        //foto opslaan in de public map en bij de user
        if(!empty($request->file('avatar'))){
                $file = $request->file('avatar');
                $imageSrc = time().'.'.$file->extension();
                $file->move(public_path('attachments'), $imageSrc);
                $fileName = $imageSrc;
        }

        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Save the registration data in an array
        if(!empty($fileName)){
            $registration_data = [
                'naam' => $request->input('naam'), 
                'geboortedatum' => $request->input('geboortedatum'), 
                'email' => $request->input('email'), 
                'wachtwoord' => $request->input('wachtwoord'),
                'bio' => $request->input('bio'),
                'bedrijfsnaam' => $request->input('bedrijfsnaam'),
                'ondernemingsnummer' => $request->input('ondernemingsnummer'),
                'bedrijfsemail' => $request->input('bedrijfsemail'),
                'telefoon' => $request->input('telefoon'),
                'opstartdatum' => $request->input('opstartdatum'),
                'fileName' => $fileName
            ];
        }else{
            $registration_data = [
                'naam' => $request->input('naam'), 
                'geboortedatum' => $request->input('geboortedatum'), 
                'email' => $request->input('email'), 
                'wachtwoord' => $request->input('wachtwoord'),
                'bio' => $request->input('bio'),
                'bedrijfsnaam' => $request->input('bedrijfsnaam'),
                'ondernemingsnummer' => $request->input('ondernemingsnummer'),
                'bedrijfsemail' => $request->input('bedrijfsemail'),
                'telefoon' => $request->input('telefoon'),
                'opstartdatum' => $request->input('opstartdatum')
            ];
        }
        


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
        return view('google2fa.registerZelf', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);

         
    }

    public function completeRegistrationZelf(Request $request)
      {   

          // add the session data back to the request input
          $request->merge(session('registration_data'));

          // Call the default laravel authentication
          return $this->addZelfstandige($request);
      }

    public function addZelfstandige($request){
        
        //user maken
        $user = new User();
        $user->name = $request->input('naam');
        $user->birth_date = $request->input('geboortedatum');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('wachtwoord'));
        $user->bio = $request->input('bio');
        $user->google2fa_secret = $request->input('google2fa_secret');
        if(!empty($request->input('fileName'))){
            $user->avatar = $request->input('fileName');
        }
        $user->save();
        
        
        //company maken
        $company = new Company();
        $company->name = $request->input('bedrijfsnaam');
        $company->account_number = $request->input('ondernemingsnummer');
        $company->email = $request->input('bedrijfsemail');
        $company->phone = $request->input('telefoon');
        $company->start_date = $request->input('opstartdatum');
        $company->user_id = $user->id;
        $company->save();

        //add dummy todo's
        DashboardController::makeDummyTodo($user->id);

        //email verzenden voor verificatie
        event(new Registered($user));

        auth()->login($user);

        //redirecten naar login
        $request->session()->flash('success', 'Je account is aangemaakt. Je hebt een email gekregen om je emailadres te verifieren');
        return redirect('/login');
    }

}
