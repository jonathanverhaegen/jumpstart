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

        <div class="settings__container__mobile">

            <div class="settings__list__mobile">
                <a href="/instellingen" class="settings__list__item__mobile">
                    Profiel bewerken
                </a>
                <a href="/instellingen/wachtwoord-wijzigen" class="settings__list__item__mobile">
                    Wachtwoord wijzigen
                </a>
                <a href="#" class="settings__list__item__mobile">
                    Links en websites
                </a>
                <a href="#" class="settings__list__item__mobile">
                    Notificaties
                </a>
                <a href="#" class="settings__list__item__mobile">
                    Privacy en beveiliging
                </a>
                <a href="/instellingen/statuut-stopzetten" class="settings__list__item__mobile">
                    Statuut
                </a>
                <a href="#" class="settings__list__item__mobile">
                    Contact
                </a>
                <a href="#" class="settings__list__item__mobile">
                    Help
                </a>
            </div>

        </div>

@endsection