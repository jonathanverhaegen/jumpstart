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





    <div class="comm__container">
    <h1>Mijn community</h1>
    <a href="/community/edit"><img src="{{asset('img/aanpassen.png')}}" alt="edit" class="edit__icon"></a>
        <div class="comm">
            <a href="/community/detail" class="comm__blok">
                    <p class="comm__blok__title">Boekhouden</p>
             </a>

        </div>

        <div class="comm">
            <a href="/community/detail" class="comm__blok">
                    <p class="comm__blok__title">Administratie</p>
             </a>

        </div>

        <div class="comm">
            <a href="/community/detail" class="comm__blok">
                    <p class="comm__blok__title">Adverteren</p>
             </a>

        </div>

        <div class="comm">
            <a href="/community/detail" class="comm__blok">
                    <p class="comm__blok__title">Marketing</p>
             </a>

        </div>

        <div class="comm">
            <a href="/community/detail" class="comm__blok">
                    <p class="comm__blok__title">Sociale Media</p>
             </a>

        </div>

        <div class="comm__">
            <a href="/community/detail" class="comm__blok__">
                    <p class="comm__blok__title__">ICE CUBE</p>
             </a>

        </div>

    </div> 




@endsection