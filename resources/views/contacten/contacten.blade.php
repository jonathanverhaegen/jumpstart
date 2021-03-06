@extends('layouts/app')

@section('title', 'Contacten')

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





    <div class="contact__container">
        @foreach($instanties as $i)
        <div class="contact">
            <a href="/contacten/instantie/{{$i->id}}" class="contact__blok">
                    <p class="contact__blok__title">{{$i->name}}</p>
             </a>
        </div>
        @endforeach
    </div> 

    

    <div class="contact__container__zoek">
        <h1 class="title">Recente zoekopdrachten</h1>
        <div class="contact__zoek__grid">
        @foreach($agents as $agent)
        <div class="contact__zoek">
        <div class="contact__blok__zoek">
                <div class="contact__blok__user">
                    <img class="pic1" src="/attachments/{{ $agent->avatar }}" alt="avatar">
                    <p class="contact__zoek__name">{{$agent->name}}</p>
                    <p class="contact__zoek__mail">{{$agent->email}}</p>
                </div>
                <div class="contact__blok__info">
                    <div class="contact__blok__info__item">
                        <img src="{{asset('img/profiel.png')}}" alt="profile" class="icon">
                        <a href="/contacten/{{$agent->id}}" class="contact__zoek__link">Profiel bekijken</a>
                    </div>
                    <div class="contact__blok__info__item">
                        <img  src="{{asset('img/chatting.png')}}" alt="chat" class="icon">
                        <a href="/chat/addConversation/{{$agent->id}}" class="contact__zoek__link">Bericht sturen</a>
                    </div>
                    <div class="contact__blok__info__item">
                        <img  src="{{asset('img/tel.png')}}" alt="call" class="icon">
                        <a href="" class="contact__zoek__link">Bellen</a>
                    </div>
                </div>

             </div>
        </div>
        @endforeach
        </div>
    </div> 

@endsection