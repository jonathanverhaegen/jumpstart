@extends('layouts.app')

@section('content')

    <div class="auth">
        <p class="auth__title">Set up Google Authenticator</p>

        <div class="auth__info">
            <p class="auth__info__title">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code:</p>
            <p class="auth__info__title auth__info__title--bold">{{$secret}}</p>
            <div class="auth__info__img">
                <img class="auth__qr" src="{{ $QR_Image }}">
            </div>
        </div>

        <div class="auth__info">
            <p class="auth__info__title">You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
            <div class="auth__btn">
                <a href="/complete-registration"><button class="btn-primary">Complete Registration</button></a>
            </div>
        </div>

    </div>

@endsection
