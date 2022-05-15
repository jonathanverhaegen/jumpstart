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




    <div class="detail__container">
        <div class="detail">
                    <img class="detail__pic" src="{{asset('img/sarah_groot.png')}}" alt="sarah"><p class="detail__name">Sarah Van Eynde</p>
                    <p class="detail__functie">ondernemingscoach ICE CUBE</p>
                    <a href="" ><img src="{{asset('img/mail.png')}}" alt="mail" class="detail__icon1"></a>
                    <a href="" ><img src="{{asset('img/chatting.png')}}" alt="chat" class="detail__icon2"></a>
                    <a href="" ><img src="{{asset('img/tel.png')}}" alt="call" class="detail__icon3"></a>
        </div>

    </div> 




@endsection