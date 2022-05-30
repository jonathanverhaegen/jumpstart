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





      
    <h1 class="h__reg__sz">Registreren</h1>
      <form action="user/addZelfstandige" method="post" class="form__sz">
      @csrf
      <h1 class="h__signup__sz">Word lid van onze community</h1>
      
        <div class="">
        <input class="name__sz" type="text" name="name" placeholder="Naam en voornaam" value="">
        </div>

        <div class="">
        <input class="date__sz" type="date" name="birthdate" placeholder="Geboortedatum" value="">
        </div>

        <div class="">
        <input class="mail__sz" type="text" name="email" placeholder="Email" value="">
        </div>

        <div class="">
        <input class="pass__sz" type="password" name="password" placeholder="Wachtwoord" value="">
        </div>

        <div class="">
        <input class="pass__sz__" type="password" name="password_confirmation" placeholder="Wachtwoord bevestigen" value="">
        </div>
        
      
    <div class="">
        <button class="reg__sz" type="submit"><p class="__reg__sz">Registreer</p></button>
    </div>
      
      </form>




@endsection