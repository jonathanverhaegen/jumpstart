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


<div class="detail__container__">
    <div class="detail__container__base">
        <a href="/contacten"><img src="{{asset('img/back.png')}}" alt="back" class="back"></a>
        <div class="detail">
                    <img class="detail__pic" src="/img/{{$agent->avatar}}" alt="{{$agent->firstname}}"><p class="detail__name">{{$agent->firstname}} {{$agent->lastname}}</p>
                    <p class="detail__functie">{{$agent->info}}</p>
                    <a href="mailto:{{$agent->email}}" ><img src="{{asset('img/mail.png')}}" alt="mail" class="detail__icon1"></a>
                    <a href="" ><img src="{{asset('img/chatting.png')}}" alt="chat" class="detail__icon2"></a>
                    <a href="tel:{{$agent->phone}}" ><img src="{{asset('img/tel.png')}}" alt="call" class="detail__icon3"></a>
        </div>

    </div> 

    <div class="bio__container">
     <h1 class="bio">Bio</h1>
        <p class="bio__inhoud">
            {{$agent->bio}}
        </p>


     <h1 class="tijd">Beschikbaarheid</h1>
        <img src="{{asset('img/kalender.png')}}" alt="calender" class="icon__cal"><p class="day">{{$agent->vergaderdagen}}</p>
        <img src="{{asset('img/klok.png')}}" alt="clock" class="icon__clock"><p class="hour">{{$agent->uren}}</p>



    </div>

</div>

@endsection