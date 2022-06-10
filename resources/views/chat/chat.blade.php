@extends('layouts/app')

@section('title', 'Chat')

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

        <div class="chat__container chat__container--mob">

            <div class="chat__list">

                <div class="chat__list__heading">
                    <img src="/attachments/{{$user->avatar}}" alt="profile" class="chat__list__heading__profile">
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
                    @if($con->chats[count($con->chats)-1]->read === 0 && $con->chats[count($con->chats)-1]->sender_id !== Auth::id())
                        @if($con->id === $conversation_id)
                            <a href="/chat/{{$con->id}}" class="chat__list__person chat__list__person--active">
                        @else
                            <a href="/chat/{{$con->id}}" class="chat__list__person chat__list__person--unread">
                        @endif 
                    @else
                        @if($con->id === $conversation_id)
                            <a href="/chat/{{$con->id}}" class="chat__list__person chat__list__person--active">
                        @else
                            <a href="/chat/{{$con->id}}" class="chat__list__person">
                        @endif 
                    @endif
                        @if($con->user_one === Auth::id())
                        <img src="/attachments/{{$con->usertwo->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->usertwo->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text,0,40)}}...</span>
                        @else
                        <img src="/attachments/{{$con->userone->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->userone->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text,0,40)}}...</span>
                        @endif
                    </a>
                    @endforeach

                </div>

            </div>

        </div>

        <div class="chat__container chat__container--desk">

            <div class="chat__list">

                <div class="chat__list__heading">
                    <img src="/attachments/{{$user->avatar}}" alt="profile" class="chat__list__heading__profile">
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
                    @if($con->chats[count($con->chats)-1]->read === 0 && $con->chats[count($con->chats)-1]->sender_id !== Auth::id())
                        @if($con->id === $conversation_id)
                            <a href="/chat?chat={{$con->id}}" class="chat__list__person chat__list__person--active">
                        @else
                            <a href="/chat?chat={{$con->id}}" class="chat__list__person chat__list__person--unread">
                        @endif 
                    @else
                        @if($con->id === $conversation_id)
                            <a href="/chat?chat={{$con->id}}" class="chat__list__person chat__list__person--active">
                        @else
                            <a href="/chat?chat={{$con->id}}" class="chat__list__person">
                        @endif 
                    @endif
                        @if($con->user_one === Auth::id())
                        <img src="/attachments/{{$con->usertwo->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->usertwo->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text,0,20)}}...</span>
                        @else
                        <img src="/attachments/{{$con->userone->avatar}}" alt="Sarah" class="chat__list__profile">
                        <span class="chat__list__name">{{$con->userone->name}}</span>
                        <span class="chat__list__preview">{{substr($con->chats[count($con->chats)-1]->text, 0, 20)}}...</span>
                        @endif
                    </a>
                    @endforeach

                </div>

            </div>

            @if(!empty($conversation_id))
                <livewire:conversation :conversation_id="$conversation_id" />
            @endif
        </div>

        

@endsection