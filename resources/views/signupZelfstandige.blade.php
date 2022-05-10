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





      
        
      <form action="user/addZelfstandige" method="post" class="">
      @csrf
      <h1 class="">Register als zelfstandige</h1>
      
        <div class="">
        <label class="" for="name">Naam en voornaam</label>
        <input class="" type="text" name="name" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="birthdate">Geboortedatum</label>
        <input class="" type="date" name="birthdate" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="email">Email</label>
        <input class="" type="text" name="email" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="password">wachtwoord</label>
        <input class="" type="password" name="password" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="password_confirmation">Wachtwoord bevestigen</label>
        <input class="" type="password" name="password_confirmation" placeholder="" value="">
        </div>
        
      
    <div class="">
        <button class="" type="submit">Register</button>
    </div>
      
      </form>




@endsection