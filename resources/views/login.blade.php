@extends('layouts/app')

@section('title', 'Login')

@section('content')




    <form class="form--login" action="/user/login" method="post">
    @csrf
        <div class="form--login__img">
            
        </div>

        <p class="form--login__header form--login__header--strong">Log nu in</p>
        <p class="form--login__header">Op jouw account</p>

        <div class="form--login__fields">

            <input class="form--login__input" type="text" name="email" placeholder="Email">
            <input class="form--login__input password" type="password" name="wachtwoord" placeholder="Wachtwoord">
            <img class="togglePassword" src="{{asset('img/verborgen.png')}}" alt="toggle">
            <p class="form--login__forgot">Wachtwoord vergeten?</p>

        </div>

        <div class="form--login__btn">
            <button class="formBtn" type="submit">Login</button>
        </div>

        <p class="form--login__link">Nieuw bij jumpstart?   <a href="/signup">Registreer</a></p>

    </form>

@endsection