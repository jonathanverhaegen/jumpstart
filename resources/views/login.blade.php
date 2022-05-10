@extends('layouts/app')

@section('title', 'Login')

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





      
        
      <form action="/user/login" method="post" class="">
      @csrf
      <h1 class="">Login</h1>

        <div class="">
        <label class="" for="email">Email</label>
        <input class="" type="text" name="email" placeholder="" value="">
        </div>

        <div class="">
        <label class="" for="password">wachtwoord</label>
        <input class="" type="password" name="password" placeholder="" value="">
        </div>

      
    <div class="">
        <button class="" type="submit">Register</button>
    </div>
      
      </form>




@endsection