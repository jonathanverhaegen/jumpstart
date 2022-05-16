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





<div class="edit__container">
    <h1>Mijn community</h1>
        <div class="edit">
            <div class="edit__blok">
                    <img src="{{asset('img/checked.png')}}" alt="checked" class="checked__icon1">
                    <p class="edit__blok__title">Boekhouden</p>
            </div>
        </div>

        <div class="edit">
            <div class="edit__blok">
                    <img src="{{asset('img/checked.png')}}" alt="checked" class="checked__icon2">
                    <p class="edit__blok__title">Administratie</p>
            </div>
        </div>

        <div class="edit">
            <div class="edit__blok">
                    <img src="{{asset('img/checked.png')}}" alt="checked" class="checked__icon3">
                    <p class="edit__blok__title">Adverteren</p>
            </div>
        </div>

        <div class="edit">
            <div class="edit__blok">
                    <img src="{{asset('img/checked.png')}}" alt="checked" class="checked__icon4">
                    <p class="edit__blok__title">Marketing</p>
            </div>
        </div>

        <div class="edit">
            <div class="edit__blok">
                    <img src="{{asset('img/checked.png')}}" alt="checked" class="checked__icon5">
                    <p class="edit__blok__title">Sociale Media</p>
            </div>       
        </div>

        <div class="edit__">
            <div class="edit__blok__">
                <img src="{{asset('img/unchecked.png')}}" alt="unchecked" class="unchecked__icon1">
                <p class="edit__blok__title__">ICE CUBE</p>
            </div>
        </div>

        <div class="edit__">
            <div class="edit__blok__">
                <img src="{{asset('img/unchecked.png')}}" alt="unchecked" class="unchecked__icon2">
                <p class="edit__blok__title__">SINC</p>
            </div>
        </div>


        <div class="edit__">
            <div class="edit__blok__">
                <img src="{{asset('img/unchecked.png')}}" alt="unchecked" class="unchecked__icon3">
                <p class="edit__blok__title__">MANESTARTERS</p>
            </div>
        </div>

</div> 




@endsection