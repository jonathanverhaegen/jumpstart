@extends('layouts.app')

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
    
    <!-- https://www.sitepoint.com/2fa-in-laravel-with-google-authenticator-get-secure/zz -->
    <div class="auth">
        <p class="auth__title">Inloggen met Google Authenticatie</p>

        <form class="auth__form" action="{{ route('2fa') }}" method="post">
        @csrf
            <div class="auth__form__group">
                <p class="auth__form__text">Vul hier je <strong>OTP</strong> die gegenereerd is via Google Authenticator <br> Wees er zeker van dat je de huidige invoert.</p>
                
                <div class="auth__input">
                    <input id="one_time_password" type="number" class="form--login__input" name="one_time_password" required autofocus>
                </div>

            </div>

            <div class="auth__form__group">
                <div class="auth__form__btn">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>

        </form>

       
    </div>

@endsection