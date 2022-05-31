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

        @if($flash = session('message'))
        @component('components/notification')
        @slot('type') message @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif





      
    <img class="ill__su__s" src="/img/ill_signup_s.png" alt="illustration">  
      <form action="/user/addStudent" method="post" class="">
      @csrf
      <h1 class="h__signup__s">Word nu student-zelfstandige!</h1>
      
        <div class="">
        <input class="name" type="text" name="naam" placeholder="Naam en voornaam" value="{{ old('naam') }}">
        </div>

        <div class="">
        <input class="date" type="date" name="geboortedatum" placeholder="Geboortedatum" value="{{ old('geboortedatum') }}">
        </div>

        <div class="">
        <input class="mail" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>

        <div class="passwordToggle">
        <input id="pass" class="pass" type="password" name="wachtwoord" placeholder="Wachtwoord" value="">
        <img class="togglePass" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>

        <div class="passwordToggle">
        <input id="pass" class="pass__" type="password" name="wachtwoord_confirmation" placeholder="Wachtwoord bevestigen" value="">
        <img class="togglePass" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>
        
      
    <div class="">
        <button class="reg__student" type="submit"><p class="__reg__student">Registreer</p></button>
    </div>
      
      </form>




@endsection