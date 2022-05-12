@extends('layouts/app')

@section('title', 'Homepage')

@section('content')

@if($errors->any())
    @component('components/notification')
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endcomponent
@endif

@if($flash = session('error'))
@component('components/notification')
        <ul>
            <li>{{ $flash }}</li>
        </ul>
    @endcomponent
@endif

@if($flash = session('success'))
@component('components/notification')
        <ul>
            <li>{{ $flash }}</li>
        </ul>
    @endcomponent
@endif


    <x-headerMob />

    <x-search />

    <div class="roadmap__container">
        <div class="roadmap">
            <a href="" data-stage="1" class="roadmap__stage roadmap__stage--1">
                <div class="roadmap__stage__title">Bank</div>
                <div class="roadmap__stage__number roadmap__stage__number--right">1</div>
            </a>

            <a href="" data-stage="2" class="roadmap__stage roadmap__stage--2">
                <div class="roadmap__stage__number roadmap__stage__number--left">2</div>
                <div class="roadmap__stage__title">Activiteiten</div>
            </a>

            <a href="" data-stage="3" class="roadmap__stage roadmap__stage--3">
                <div class="roadmap__stage__title">Sociale bijdragen</div>
                <div class="roadmap__stage__number roadmap__stage__number--right">3</div>
            </a>

            <a href="" data-stage="4" class="roadmap__stage roadmap__stage--4">
                <div class="roadmap__stage__number roadmap__stage__number--left">4</div>
                <div class="roadmap__stage__title">Sociaal verzekeringsfond</div>
            </a>

            <a href="" data-stage="5" class="roadmap__stage roadmap__stage--5">
                <div class="roadmap__stage__title">Bank</div>
                <div class="roadmap__stage__number roadmap__stage__number--right">5</div>
            </a>

            <a href="" data-stage="6" class="roadmap__stage roadmap__stage--6">
                <div class="roadmap__stage__number roadmap__stage__number--left">6</div>
                <div class="roadmap__stage__title">Btw-administratie</div>
            </a>

            <a href="" data-stage="7" class="roadmap__stage roadmap__stage--7">
                <div class="roadmap__stage__title">Ondernemingsnummer</div>
                <div class="roadmap__stage__number roadmap__stage__number--right">7</div>
            </a>

            <a href="" data-stage="8" class="roadmap__stage roadmap__stage--8">
                <div class="roadmap__stage__number roadmap__stage__number--left">8</div>
                <div class="roadmap__stage__title">Student-zelfstandige</div>
            </a>
            
        </div>
    </div>




@endsection