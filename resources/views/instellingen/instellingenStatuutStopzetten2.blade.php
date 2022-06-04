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

        <div class="settings__container settings__container__status">

            <div class="settings__list">
                <a href="/instellingen" class="settings__list__item">
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
                <a href="/instellingen/statuut-stopzetten/1" class="settings__list__item settings__list__item--active">
                    Statuut
                </a>
                <a href="#" class="settings__list__item">
                    Contact
                </a>
                <a href="#" class="settings__list__item">
                    Help
                </a>
            </div>

            <div class="settings__second__list--mobile">
                <a href="#" class="settings__second__list__item">
                    Statuut aanpassen
                </a>
                <a href="/instellingen/statuut-stopzetten/1" class="settings__second__list__item settings__second__list__item--active">
                    Statuut stopzetten
                </a>
            </div>

            <div class="settings__second__list">
                <a href="#" class="settings__second__list__item">
                    Statuut aanpassen
                </a>
                <a href="/instellingen/statuut-stopzetten" class="settings__second__list__item settings__second__list__item--active">
                    Statuut stopzetten
                </a>
            </div>

            <div class="settings__detail settings__detail__status">
                <form action="/instellingen/statuut-stopzetten/3" method="GET" class="settings__status-form">
                    <h3>Waarom wil je stoppen met ondernemen?</h3>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option1" name="reason" value="Mijn onderneming heeft minder succes dan verwacht.">
                        <label for="reason1">Mijn onderneming heeft minder succes dan verwacht.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option2" name="reason" value="De combinatie studeren en ondernemen is moeilijk.">
                        <label for="reason2">De combinatie studeren en ondernemen is moeilijk.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option3" name="reason" value="Ondernemen is echt niet voor mij.">
                        <label for="reason3">Ondernemen is echt niet voor mij.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option4" name="reason" value="Ik voel mij niet genoeg ondersteund door mijn school.">
                        <label for="reason4">Ik voel mij niet genoeg ondersteund door mijn school.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option5" name="reason" value="De administratie is toch nog te veel en te ingewikkeld.">
                        <label for="reason5">De administratie is toch nog te veel en te ingewikkeld.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option6" name="reason" value="Andere">
                        <label for="reason6">Andere</label>
                    </div>
                    <input type="submit" value="Volgende">
                </form>
            </div>

        </div>

@endsection