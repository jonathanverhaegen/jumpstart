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
                <div class="settings__detail__profile-picture">
                    <img src="./img/Laurens.png" alt="Profielfoto">
                    <div class="settings__detail__profile-picture__name">
                        <span class="settings__user-name">Kelly Smith</span>
                        <label class="settings__upload-profile-picture"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profielfoto wijzigen</label>
                    </div>
                </div>

                <div class="settings__detail__info">
                    <form action="#" method="POST">
                        
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" class="settings__detail__info__input" value="Kelly Smith">

                        <label for="company-name">Bedrijfsnaam</label>
                        <input type="text" name="company-name" id="company-name" class="settings__detail__info__input" value="Kelly Smith Design">

                        <label for="email">E-mailadres</label>
                        <input type="email" name="email" id="email" class="settings__detail__info__input" value="kelly.smith@gmail.com">

                        <label for="phone">Telefoonnummer</label>
                        <input type="text" name="phone" id="phone" class="settings__detail__info__input" value="0488 17 57 41">

                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="8">Kelly Smith Design is een jong bedrijf dat draait rond diversiteit, dit is terug te vinden in de designs. De focus van KSD ligt op branding en rebranding van merken en producten. Neem gerust een kijkje op Behance voor voorbeelden.</textarea>

                        <input type="submit" value="Verzenden">

                    </form>
                </div>
            </div>

        </div>

@endsection