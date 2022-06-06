@extends('layouts/app')

@section('title', 'Register')

@section('content')

@if($errors->any())
    @component('components/notification')
    @slot('type') error @endslot
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endcomponent
    @endif

    @if($flash = session('error'))
    @component('components/notification')
    @slot('type') error @endslot
        <ul>
            <li>{{ $flash }}</li>
        </ul>
    @endcomponent
    @endif

    @if($flash = session('success'))
    @component('components/notification')
    @slot('type') success @endslot
        <ul>
            <li>{{ $flash }}</li>
        </ul>
    @endcomponent
    @endif


    <div class="signupZelf">  
        

    <h1 class="h__reg__sz">Registreren</h1>
      <form action="/user/addZelfstandige" method="post" class="form__sz" enctype="multipart/form-data">
      @csrf

      <h1 class="h__signup__sz">Word lid van onze community</h1>

      <div class="signup__container__zelf">

      <div class="addZelf addZelf1">
        
        <input class="signup__input signup__input--zelf" type="text" name="naam" placeholder="Naam en voornaam" value="{{old('naam')}}">
        
        <input class="signup__input signup__input--zelf" type="date" name="geboortedatum" placeholder="Geboortedatum" value="{{old('geboortedatum')}}">
        
        <input class="signup__input signup__input--zelf" type="text" name="email" placeholder="Email" value="{{old('email')}}">
        
        <div class="passwordToggleZelf">
        <input class="signup__input signup__input--pass signup__input--zelf" type="password" name="wachtwoord" placeholder="Wachtwoord" value="">
        <img class="togglePass--signup" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>

        <div class="passwordToggleZelf">
        <input class="signup__input signup__input--pass signup__input--zelf" type="password" name="wachtwoord_confirmation" placeholder="Wachtwoord bevestigen" value="">
        <img class="togglePass--signup" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>
        
        <div class="form__punt">
            <img class="togglePunt" src="/img/ill__sz__1.png" alt="punt">
        </div>
        

        <div class="form__btn">
            <button class="reg__sz btn1" type="submit">Volgende</button>
        </div>

    </div>

    <div class="addZelf addZelf2">
            
            <input class="signup__input signup__input--zelf" type="text" name="bedrijfsnaam" placeholder="Bedrijfsnaam" value="{{old('bedrijfsnaam')}}">
            

            
            <input class="signup__input signup__input--zelf" type="text" name="ondernemingsnummer" placeholder="Ondernemingsnummer" value="{{old('ondernemingsnummer')}}">
            

            
            <input class="signup__input signup__input--zelf" type="text" name="bedrijfsemail" placeholder="Bedrijfsmail" value="{{old('bedrijfsemail')}}">
            

            
            <input class="signup__input signup__input--zelf" type="number" name="telefoon" placeholder="Telefoonnummer" value="{{old('telefoon')}}">
            

            
            <input class="signup__input signup__input--zelf" type="date" name="opstartdatum" placeholder="Opstartdatum" value="{{old('opstartdatum')}}">
            
            
            <div class="form__punt">
                <img class="togglePunt" src="/img/ill__sz__2.png" alt="punt">
            </div>
            
            <div class="form__btn">
                <button class="reg__sz btn2" type="submit">Volgende</button>
            </div>
    </div>

    <div class="addZelf addZelf3">
            <div class="form__avatar">
                <img class="sz__pic" src="/img/default.png" alt="profile pic">
                <label class="__prof__sz"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profiel foto wijzigen</label>
            </div>

            
            <textarea class="signup__input signup__input--zelf signup__input--textarea" name="bio" id="" cols="30" rows="8" placeholder="Bio">{{old('bio')}}</textarea>
            

            <div class="form__punt">
                <img class="togglePunt" src="/img/ill__sz__3.png" alt="punt">
            </div>
            

            <div class="form__btn">
                <button class="reg__sz btn3" type="submit">Volgende</button>
            </div>
    </div>

    </div>

    </form>
    </div>
      
    
      

    



@endsection