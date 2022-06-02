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
      <form action="/user/addZelfstandige" method="post" class="form__sz" >
      @csrf
      <h1 class="h__signup__sz">Word lid van onze community</h1>

      <div class="addZelf1">
        <div class="">
        <input class="name__sz" type="text" name="naam" placeholder="Naam en voornaam" value="{{old('naam')}}">
        </div>

        <div class="">
        <input class="date__sz" type="date" name="geboortedatum" placeholder="Geboortedatum" value="{{old('geboortedatum')}}">
        </div>

        <div class="">
        <input class="mail__sz" type="text" name="email" placeholder="Email" value="{{old('email')}}">
        </div>

        <div class="passwordToggleZelf">
        <input class="pass__sz" type="password" name="wachtwoord" placeholder="Wachtwoord" value="">
        <img class="togglePass__" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>

        <div class="passwordToggleZelf">
        <input class="pass__sz" type="password" name="wachtwoord_confirmation" placeholder="Wachtwoord bevestigen" value="">
        <img class="togglePass__" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>
        
        <div class="form__punt">
            <img class="togglePunt" src="/img/ill__sz__1.png" alt="punt">
        </div>
        

        <div class="form__btn">
            <button class="reg__sz btn1" type="submit">Volgende</button>
        </div>
    </div>

    <div class="addZelf2">
        <div class="">
            <input class="name__sz" type="text" name="bedrijfsnaam" placeholder="Bedrijfsnaam" value="{{old('bedrijfsnaam')}}">
            </div>

            <div class="">
            <input class="date__sz" type="text" name="ondernemingsnummer" placeholder="Ondernemingsnummer" value="{{old('ondernemingsnummer')}}">
            </div>

            <div class="">
            <input class="mail__sz" type="text" name="bedrijfsemail" placeholder="Bedrijfsmail" value="{{old('bedrijfsemail')}}">
            </div>

            <div class="">
            <input class="pass__sz" type="number" name="telefoon" placeholder="Telefoonnummer" value="{{old('telefoon')}}">
            </div>

            <div class="">
            <input class="pass__sz__" type="date" name="opstartdatum" placeholder="Opstartdatum" value="{{old('opstartdatum')}}">
            </div>
            
            <div class="form__punt">
                <img class="togglePunt" src="/img/ill__sz__2.png" alt="punt">
            </div>
            
            <div class="form__btn">
                <button class="reg__sz btn2" type="submit">Volgende</button>
            </div>
    </div>

    <div class="addZelf3">
        <div class="form__avatar">
                <img class="sz__pic" src="/img/default.png" alt="profile pic">
                <label class="__prof__sz"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profiel foto wijzigen</label>
            </div>

            <div class="">
                <input class="pass__sz" type="text" max="2000" name="bio" placeholder="Bio" value="{{old('bio')}}">
            </div>

            <div class="form__punt">
                <img class="togglePunt" src="/img/ill__sz__3.png" alt="punt">
            </div>
            

            <div class="form__btn">
                <button class="reg__sz btn3" type="submit">Volgende</button>
            </div>
    </div>

    </form>
    </div>
      
    
      

    



@endsection