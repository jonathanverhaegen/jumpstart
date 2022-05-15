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
        <div class="contact">
            <a href="" class="contact__blok">
                    <p class="contact__blok__title">Overheidsinstanties</p>
             </a>

        </div>

        <div class="contact">
             <a href="" class="contact__blok">
                    <p class="contact__blok__title">Bedrijven</p>
             </a>
         </div>

         <div class="contact">
             <a href="" class="contact__blok">
                    <p class="contact__blok__title">ICE CUBE</p>
             </a>
         </div>
    </div> 

    

    <div class="contact__container__zoek">
        <h1>Recente zoekopdrachten</h1>
        <div class="contact__zoek">
             <div class="contact__blok__zoek">
                
                    <img class="pic1" src="img/sarah.png" alt="sarah"><p class="contact__zoek__name">Sarah Van Eynde</p>
                    <p class="contact__zoek__mail">sarah.vaneynde@thomasmore.be</p>
                    <img src="{{asset('img/profiel.png')}}" alt="profile" class="icon1"><a href="" class="contact__zoek__link">profiel bekijken</a>
                    <img  src="{{asset('img/chatting.png')}}" alt="chat" class="icon"><a href="" class="contact__zoek__link">bericht sturen</a>
                    <img  src="{{asset('img/tel.png')}}" alt="call" class="icon"><a href="" class="contact__zoek__link">bellen</a>
             </div>
        </div>
    

        <div class="contact__zoek">
             <div class="contact__blok__zoek">

                    <img class="pic2" src="img/annelies.png" alt="annelies"><p class="contact__zoek__name">Annelies Leysen</p>
                    <p class="contact__zoek__mail">Annelies.leysen@vlaio.be</p>
                    <img src="{{asset('img/profiel.png')}}" alt="profile" class="icon1"><a href="" class="contact__zoek__link">profiel bekijken</a>
                    <img  src="{{asset('img/chatting.png')}}" alt="chat" class="icon"> <a href="" class="contact__zoek__link">bericht sturen</a>
                    <img  src="{{asset('img/tel.png')}}" alt="call" class="icon"><a href="" class="contact__zoek__link">bellen</a>
            </div>

        </div>
      
    </div> 

@endsection