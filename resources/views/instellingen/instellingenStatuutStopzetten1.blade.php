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
                <a href="/instellingen-mobiel" class="settings__detail__back-button">
                    <img src="/img/back2.png" alt="Terug">
                </a>
                <h2 class="settings__detail__heading">Stopzetten statuut student-zelfstandige</h2>
                <p class="settings__detail__text">
                    Je staat op het punt jouw statuut student-zelfstandige stop te zetten. Het stopzetten van dit statuut vergt enkele stappen, naargelang de reden om het statuut stop te zetten in het afsluitingsproces anders. Daarom vragen we jou om enkele vragen in te vullen, zodat wij dit afsluitingsproces kunnen personaliseren naar jou.
                </p>
                <form action="/instellingen/statuut-stopzetten/2" method="POST" class="settings__status-form">
                    @csrf
                    <h3>Ik wens mijn statuut stop te zetten omwille van de volgende reden</h3>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option1" name="reason" value="Ik ga afstuderen.">
                        <label for="reason1">Ik ga afstuderen.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option2" name="reason" value="Ik ga/ben 25 jaar (ge)worden.">
                        <label for="reason2">Ik ga/ben 25 jaar (ge)worden.</label>
                    </div>
                    <div class="settings__status-form__radio">
                        <input type="radio" id="option3" name="reason" value="Ik zie het ondernemen niet meer zitten.">
                        <label for="reason3">Ik zie het ondernemen niet meer zitten.</label>
                    </div>
                    <input type="submit" value="Volgende">
                </form>
            </div>

        </div>

@endsection