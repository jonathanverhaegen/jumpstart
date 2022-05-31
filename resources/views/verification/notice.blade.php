@extends('layouts.app')

@section('content')
@if($flash = session('resent'))
    @component('components/notification')
    @slot('type') success @endslot
        <ul>
            <li>A fresh verification link has been sent to your email address.</li>
        </ul>
    @endcomponent
    @endif

    <div class="verification">
        <p class="verification__title"> Before proceeding, please check your email for a verification link. If you did not receive the email,</p>
        <form class="form--verification" action="{{ route('verification.resend') }}" method="POST">
        @csrf
            <button type="submit" class="">
                click here to request another
            </button>.
        </form>

    </div>
@endsection