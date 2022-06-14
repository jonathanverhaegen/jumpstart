@extends('layouts.app')

@section('content')
@if($flash = session('resent'))
    @component('components/notification')
    @slot('type') success @endslot
        <ul>
            <li>Eeen nieuwe verificatie link is verstuurd naar je emailadres</li>
        </ul>
    @endcomponent
    @endif

    <!-- https://codeanddeploy.com/blog/laravel/how-to-implement-laravel-8-email-verification -->
    <div class="verification">
        <p class="verification__title">Voor je verdergaat, verifieer eerst je emailadres. Als je nog geen link hebt ontvangen,</p>
        <form class="form--verification" action="{{ route('verification.resend') }}" method="POST">
        @csrf
            <button type="submit" class="">
                Klik hier om een nieuwe aan te vragen
            </button>.
        </form>

    </div>
@endsection