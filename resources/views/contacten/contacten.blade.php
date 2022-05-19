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





    <div class="contact__container">
        @foreach($instanties as $i)
        <div class="contact">
            <a href="/community/instantie/{{$i->id}}" class="contact__blok">
                    <p class="contact__blok__title">{{$i->name}}</p>
             </a>
        </div>
        @endforeach
    </div> 

    

    <div class="contact__container__zoek">
        <h1 class="title">Recente zoekopdrachten</h1>
        <div class="contact__zoek">
             <div class="contact__blok__zoek">
                
                    <img class="pic1" src="{{asset('img/sarah.png')}}" alt="sarah"><a href="contacten/detail" class="contact__zoek__name">Sarah Van Eynde</a>
                    <p class="contact__zoek__mail">sarah@thomasmore.be</p>
                    <img src="{{asset('img/profiel.png')}}" alt="profile" class="icon1"><a href="" class="contact__zoek__link">profiel bekijken</a>
                    <img  src="{{asset('img/chatting.png')}}" alt="chat" class="icon2"><a href="" class="contact__zoek__link">bericht sturen</a>
                    <img  src="{{asset('img/tel.png')}}" alt="call" class="icon3"><a href="" class="contact__zoek__link">bellen</a>
             </div>
        </div>
    

        <div class="contact__zoek">
             <div class="contact__blok__zoek">

                    <img class="pic2" src="{{asset('img/annelies.png')}}" alt="annelies"><a href="contacten/detail" class="contact__zoek__name">Annelies Leysen</a>
                    <p class="contact__zoek__mail">annelies.leysen@vlaio.be</p>
                    <img src="{{asset('img/profiel.png')}}" alt="profile" class="icon1"><a href="" class="contact__zoek__link">profiel bekijken</a>
                    <img  src="{{asset('img/chatting.png')}}" alt="chat" class="icon2"> <a href="" class="contact__zoek__link">bericht sturen</a>
                    <img  src="{{asset('img/tel.png')}}" alt="call" class="icon3"><a href="" class="contact__zoek__link">bellen</a>
            </div>

        </div>
      
    </div> 

@endsection