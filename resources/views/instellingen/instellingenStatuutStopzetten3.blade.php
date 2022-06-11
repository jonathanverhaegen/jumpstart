@extends('layouts/app')

@section('title', 'Instellingen')

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
                <a href="/instellingen/statuut-stopzetten/1" class="settings__second__list__item settings__second__list__item--active">
                    Statuut stopzetten
                </a>
            </div>

            <div class="settings__detail settings__detail__status">
                <a href="/instellingen/statuut-stopzetten/2" class="settings__detail__back-button settings__detail__back-button--show-desktop">
                    <img src="/img/back2.png" alt="Terug">
                </a>
                <form action="/statuut/stopzetten" method="POST" class="settings__status-form">
                    @csrf
                    <h3>Heb je al eens gesproken met iemand van ICE CUBE?</h3>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option1" name="reason" value="Ja, maar het heeft niet geholpen.">
                        <label for="reason1">Ja, maar het heeft niet geholpen.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option2" name="reason" value="Nee, maar misschien wil dat wel eens doen.">
                        <label for="reason2">Nee, maar misschien wil dat wel eens doen.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option3" name="reason" value="Nee, maar ik wil echt stoppen.">
                        <label for="reason3">Nee, maar ik wil echt stoppen.</label>
                    </div>
                    <input type="hidden" class="source" name="source" value="">

                    <div class="settings__status-form__buttons">
                        <input class="submit1" type="submit" value="ICE CUBE contacteren">
                        <input class="submit2" type="submit" value="Stopzetting starten">
                    </div>
                </form>
            </div>

        </div>

@endsection