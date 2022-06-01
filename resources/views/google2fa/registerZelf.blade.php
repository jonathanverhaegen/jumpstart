@extends('layouts.app')

@section('content')

    <div class="auth">
        <p class="auth__title">Google Authenticator opzetten</p>

        <div class="auth__info">
            <p class="auth__info__title">Zet je Google Authenticator op via het scannen van de QR-code. Als alternatief kan je volgende code gebruiken:</p>
            <p class="auth__info__title auth__info__title--bold">{{$secret}}</p>
            <div class="auth__info__img">
                {!! $QR_Image !!}
            </div>
        </div>

        <div class="auth__info">
            <p class="auth__info__title">Vooraleer je verdergaat moet je de Google Authenticator opzetten. Anders zal je uitgelogd worden.</p>
            <div class="auth__btn">
                <a href="/complete-registrationZelf"><button class="btn-primary">Registratie voltooien</button></a>
            </div>
        </div>

    </div>

@endsection
