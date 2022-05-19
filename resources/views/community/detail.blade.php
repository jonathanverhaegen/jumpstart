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




        <a href="/community"><img src="{{asset('img/back.png')}}" alt="back" class="__back__icon__"></a>  
        <div class="group__container">
        <h1 class="group__title">{{$group->name}}</h1>
            <div class="group__blok">
                @foreach($users as $user)
                    <img src="/public/img/{{$user->avatar}}" alt="{{$user->name}}" class="person">
                @endforeach
            </div>
        </div>

        <div class="faq__container">
        <h1 class="faq__title">FAQ boekhouden</h1>
            <div class="faq">
                <div class="faq__blok">
                    <img src="{{asset('img/uitklappen.png')}}" alt="fold" class="fold__icon1">
                    <p class="question1">Welke zakelijke onkosten kan ik inbrengen?</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq__blok">
                    <img src="{{asset('img/uitklappen.png')}}" alt="fold" class="fold__icon2">
                    <p class="question2">Hoe kan ik mijn cashflow verbeteren?</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq__blok">
                    <img src="{{asset('img/uitklappen.png')}}" alt="fold" class="fold__icon3">
                    <p class="question3">Moet ik me registreren voor de btw en wat zijn mijn fiscale verplichtingen?</p>
                </div>
            </div>

        <a href="" class="ask"><p class="ask__question">Vraag stellen</p></a>  
        </div>





@endsection