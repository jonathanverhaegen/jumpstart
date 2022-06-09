@extends('layouts/app')

@section('title', 'Contact')

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

<div class="contact__detail__container">

    <div class="contact__back">
        <a href="/contacten"><img src="/img/pijl_nieuw.png" alt=""></a>
    </div>


<div class="contact__detail">
<div class="detail__container__">
    <div class="detail__container__base">
        <div class="detail">
            <div class="detail__img">
                <img class="detail__pic" src="/attachments/{{$agent->avatar}}" alt="{{$agent->firstname}}">
            </div>

            <div class="detail__extra">
            <p class="detail__name">{{$agent->name}}</p>
            <p class="detail__functie">{{$agent->agent->info}}</p>
            <div class="detail__extra__icons">
                <a href="tel:{{$agent->agent->phone}}" ><img src="{{asset('img/tel.png')}}" alt="call" class="detail__icon3"></a>
                <a href="mailto:{{$agent->email}}" ><img src="{{asset('img/mail.png')}}" alt="mail" class="detail__icon1"></a>
                <a href="/chat/addConversation/{{$agent->id}}" ><img src="{{asset('img/chatting.png')}}" alt="chat" class="detail__icon2"></a>
            </div>
            </div>
    </div>
</div> 
</div>

    <div class="bio__container">
        <div class="bio">
            <p class="bio__title">Bio</p>
            <p class="bio__inhoud">
            {{$agent->bio}}
            </p>


            <p class="bio__title">Beschikbaarheid</p>

            <div class="bio__extra__container">
            
            <div class="bio__extra">
                <div class="bio__extra__img">
                    <img src="{{asset('img/kalender.png')}}" alt="calender" class="">
                </div>
                <div class="bio__extra__text">
                    <p class="bio__extra__text__text">Gewenste vergaderdagen</p>
                    <p class="bio__extra__text__title">{{$agent->agent->vergaderdagen}}</p>
                </div>
            </div>

            <div class="bio__extra">
                <div class="bio__extra__img bio__extra__img--right">
                <img src="{{asset('img/klok.png')}}" alt="clock" class="">
                </div>
                <div class="bio__extra__text">
                    <p class="bio__extra__text__text">Gewenste uren</p>
                    <p class="bio__extra__text__title">{{$agent->agent->uren}}</p>
                </div>
            </div>

            </div>
            
        </div>
    </div>

</div>
</div>
</div>

@endsection