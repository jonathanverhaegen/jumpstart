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

        <div class="chat__button__container">
            <span class="button__switch__chat">Open chat</span>
        </div>

        <div class="chat__container">

            <div class="chat__list">

                <div class="chat__list__heading">
                    <img src="/img/{{$user->avatar}}" alt="profile" class="chat__list__heading__profile">
                    <h1 class="chat__list__heading__h1">Berichten</h1>
                    <a href="" class="chat__list__heading__new-message">
                        <img src="./img/edit-chat.svg" alt="New chat">
                    </a>
                </div>

                <div class="chat__search-bar">
                    <input type="text" name="search-chat" id="search-chat" placeholder="Zoeken...">
                    <img src="./img/search-icon.svg" alt="Search" class="chat__search-bar__icon">
                </div>

                <div class="chat__list__overview">

                    @foreach($conversations as $con)
                    <a href="/chat?chat={{$con->id}}" class="chat__list__person">
                        @if($con->user_one === Auth::id())
                        <img src="/img/{{$con->usertwo->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->usertwo->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text,0,20)}}...</span>
                        @else
                        <img src="/img/{{$con->userone->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->userone->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text, 0, 20)}}...</span>
                        @endif
                    </a>
                    @endforeach

                </div>

            </div>

            @if(!empty($conversation))
            <div class="chat__detail">

                <div class="chat__detail__heading">
                    @if($conversation->user_one === Auth::id())
                    <img src="/img/{{$conversation->usertwo->avatar}}" alt="avatar" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->usertwo->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="./img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="./img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @else
                    <img src="./img/{{$conversation->userone->avatar}}" alt="Thomas" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->userone->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="./img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="./img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @endif
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
                    <input type="submit" value="Verzenden"/>
                </div>

            </div>
            @endif

            <div class="chat__detail__mobile">

                <div class="chat__detail__heading">
                    <img src="./img/Thomas.png" alt="Thomas" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">Thomas Gabriëls</h2>
                    <div class="chat__detail__icons">
                        <img src="./img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="./img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
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
                    <input type="submit" value="Verzenden"/>
                </div>

            </div>

        </div>

        <script>

            window.addEventListener("load", () => {

                const switchButton = document.querySelector(".button__switch__chat");
                const chatList = document.querySelector(".chat__list");
                const chatDetail = document.querySelector(".chat__detail__mobile");

                let chatStatus = "closed";

                switchButton.addEventListener("click", () => {

                    switch(chatStatus) {
                        case "closed":
                            chatStatus = "open";
                            chatList.style.display = "none";
                            chatDetail.style.display = "flex";

                            switchButton.innerText = "Sluit chat";
                            switchButton.style.backgroundColor = "#4b7fcc";

                            break;

                        case "open":
                            chatStatus = "closed";
                            chatList.style.display = "initial";
                            chatDetail.style.display = "none";

                            switchButton.innerText = "Open chat";
                            switchButton.style.backgroundColor = "#1e3472";

                            break;
                    
                        default:
                            break;
                    }

                });

            });

        </script>

@endsection