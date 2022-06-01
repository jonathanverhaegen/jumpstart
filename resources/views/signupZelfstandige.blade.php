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





      
    <h1 class="h__reg__sz">Registreren</h1>
      <form action="/user/addZelfstandige" method="post" class="form__sz">
      @csrf
      <h1 class="h__signup__sz">Word lid van onze community</h1>
      
        <div class="">
        <input class="name__sz" type="text" name="naam" placeholder="Naam en voornaam" value="">
        </div>

        <div class="">
        <input class="date__sz" type="date" name="geboortedatum" placeholder="Geboortedatum" value="">
        </div>

        <div class="">
        <input class="mail__sz" type="text" name="email" placeholder="Email" value="">
        </div>

        <div class="">
        <input class="pass__sz" type="password" name="wachtwoord" placeholder="Wachtwoord" value="">
        <img class="togglePass__" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>

        <div class="">
        <input class="pass__sz__" type="password" name="wachtwoord_confirmation" placeholder="Wachtwoord bevestigen" value="">
        <img class="togglePass__" src="{{asset('img/verborgen.png')}}" alt="toggle">
        </div>
        
        <img class="togglePunt1" src="/img/ill__sz__1.png" alt="punt">

        <div class="reg__sz">
            <button class="__reg__sz" type="submit">Volgende</button>
        </div>
    
    </form>
      
    
      

    



@endsection