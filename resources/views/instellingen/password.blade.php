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

            <div class="settings__detail">
                <div class="settings__detail__info">
                    <form action="/profile/updatePassword" method="POST">
                        @csrf 

                        <label for="oud-wachtwoord">Oud wachtwoord</label>
                        <input type="password" name="oud-wachtwoord" id="name" class="settings__detail__info__input" placeholder="Oud wachtwoord">
                    
                        <label for="nieuw-wachtwoord">Nieuw wachtwoord</label>
                        <input type="password" name="nieuw-wachtwoord" id="company-name" class="settings__detail__info__input" placeholder="Nieuw wachtwoord">
                        
                        <label for="nieuw-wachtwoord_confirmation">Bevestig nieuw wachtwoord</label>
                        <input type="password" name="nieuw-wachtwoord_confirmation" id="email" class="settings__detail__info__input" placeholder="Bevestig nieuw wachtwoord">
                        
                        <input type="submit" value="Verzenden">

                    </form>
                </div>
            </div>
            
        </div>

@endsection