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
                @if(!empty(Auth::user()->roadmap))
                <a href="/instellingen/statuut-stopzetten/1" class="settings__list__item">
                    Statuut
                </a>
                @endif
                <a href="#" class="settings__list__item">
                    Contact
                </a>
                <a href="#" class="settings__list__item">
                    Help
                </a>
            </div>

            <div class="settings__detail">
                <a href="/instellingen-mobiel" class="settings__detail__back-button">
                    <img src="/img/back2.png" alt="Terug">
                </a>
                <div class="settings__detail__profile-picture">
                    <img src="/attachments/{{$user->avatar}}" alt="Profielfoto">
                    <div class="settings__detail__profile-picture__name">
                        <span class="settings__user-name">{{$user->name}}</span>
                        <form action="/profile/updateAvatar" method="post" class="form--updateAvatar" enctype="multipart/form-data">
                            @csrf
                        <label class="settings__upload-profile-picture"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profielfoto wijzigen</label>
                        </form>
                    </div>
                </div>

                <div class="settings__detail__info">
                    <form action="/profile/update" method="POST">
                        @csrf 

                        <label for="name">Naam</label>
                        <input type="text" name="naam" id="name" class="settings__detail__info__input" value="{{$user->name}}">

                        @if(!empty($user->company))
                        <label for="company-name">Bedrijfsnaam</label>
                        <input type="text" name="bedrijfsnaam" id="company-name" class="settings__detail__info__input" value="{{$user->company->name}}">
                        @endif

                        <label for="email">E-mailadres</label>
                        <input type="email" name="email" id="email" class="settings__detail__info__input" value="{{$user->email}}">

                        @if(!empty($user->company))
                        <label for="phone">Telefoonnummer</label>
                        <input type="text" name="telefoon" id="phone" class="settings__detail__info__input" value="{{$user->company->phone}}">
                        @endif

                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="8">{{$user->bio}}</textarea>

                        <input type="submit" value="Verzenden">

                    </form>
                </div>
            </div>

        </div>

@endsection