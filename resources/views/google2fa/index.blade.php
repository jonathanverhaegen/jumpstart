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
    
    <div class="auth">
        <p class="auth__title">Register</p>

        <form class="auth__form" action="{{ route('2fa') }}" method="post">
        @csrf
            <div class="auth__form__group">
                <p class="auth__form__text">Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                
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