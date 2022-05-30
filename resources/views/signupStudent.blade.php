@extends('layouts/app')

@section('title', 'Register')

@section('content')

@if($errors->any())
    @component('components/notification')
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endcomponent
@endif

@if($flash = session('error'))
@component('components/notification')
        <ul>
            <li>{{ $flash }}</li>
        </ul>
    @endcomponent
@endif

@if($flash = session('success'))
@component('components/notification')
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
        <label class="" for="name">Naam en voornaam</label>
        <input class="name" type="text" name="name" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="birthdate">Geboortedatum</label>
        <input class="date" type="date" name="birthdate" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="email">Email</label>
        <input class="mail" type="text" name="email" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="password">Wachtwoord</label>
        <input class="pass" type="password" name="password" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="password_confirmation">Wachtwoord bevestigen</label>
        <input class="pass__" type="password" name="password_confirmation" placeholder="" value="">
        </div>
        
      
    <div class="">
        <button class="reg__student" type="submit"><p class="__reg__student">Registreer</p></button>
    </div>
      
      </form>




@endsection