@extends('layouts/app')

@section('title', 'Homepage')

@section('content')



    <div class="container">

    <div class="header__container">
        <x-header />
    </div>

    <div class="body__container">
        <x-search />

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

        @if($flash = session('message'))
        @component('components/notification')
        @slot('type') message @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif

        <div class="settings__container">

            <div class="settings__list">
                <a href="#" class="settings__list__item settings__list__item--active">
                    Profiel bewerken
                </a>
                <a href="/instellingen/wachtwoord-wijzigen" class="settings__list__item">
                    Wachtwoord wijzigen
                </a>
                <a href="#" class="settings__list__item">
                    Links en websites
                </a>
                <a href="#" class="settings__list__item">
                    Notificaties
                </a>
                <a href="#" class="settings__list__item">
                    Privacy en beveiliging
                </a>
                <a href="/instellingen/statuut" class="settings__list__item">
                    Statuut
                </a>
                <a href="#" class="settings__list__item">
                    Contact
                </a>
                <a href="#" class="settings__list__item">
                    Help
                </a>
            </div>

            <div class="settings__detail">
                Dit zijn de instellingen.
            </div>

        </div>

@endsection