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

        <div class="chat__container">

            <div class="chat__list">

                <div class="chat__list__heading">
                    <img src="" alt="" class="chat__list__heading__profile">
                    <h1 class="chat__list__heading__h1">Berichten</h1>
                    <a href="" class="chat__list__heading__new-message">
                        <img src="" alt="">
                    </a>
                </div>

                <input type="text" name="search-chat" id="search-chat" placeholder="Zoeken...">

                <div class="chat__list__overview">
                    <div class="chat__list__person">
                        <img src="" alt="" class="chat__list__profile">
                        <span class="chat__list__name">Sarah Peeters</span>
                        <span class="chat__list__preview">Hey Kelly, met welke stap va…</span>
                    </div>
                </div>

            </div>

            <div class="chat__detail">

                <div class="chat__detail__heading">
                    <img src="" alt="" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">Thomas Gabriëls</h2>
                    <div class="chat__detail__icons">
                        <img src="" alt="" class="chat__detail__icons__search">
                        <img src="" alt="" class="chat__detail__icons__settings">
                    </div>
                </div>

                <div class="chat__detail__messages">
                    <span class="chat__message chat__message--from">
                        Hallo Surinde, ik wou je graag een berichtje sturen omdat ik zeer benieuwd was naar hoe jij juist begonnen bent met het leren van Laravel.
                    </span>
                    <span class="chat__message chat__message--to">
                        Dag Thomas, wat leuk dat je een berichtje stuurt! Ik ben nog maar net begonnen met het leren van Laravel, dus ben er nog niet zo goed in.
                    </span>
                    <span class="chat__message chat__message--from">
                        Oh, dat wist ik niet. Volg jij dan een bepaalde online cursus ofzo?
                    </span>
                    <span class="chat__message chat__message--to">
                        Soort van, in mijn opleiding hebben we een docent die online cursussen maakt, maar die enkel toegankelijk zijn voor zijn studenten. Ik vrees dus dat jij hier geen gebruik van zal kunnen maken.
                    </span>
                </div>

                <div class="chat__detail__send-message">
                    <input type="text" name="send-message" id="send-message" class="chat__detail__send-message__input" placeholder="Typ hier iets…">
                </div>

            </div>

        </div>

@endsection