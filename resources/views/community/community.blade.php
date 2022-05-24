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
        @if(!empty($groups[0]))
        @foreach($groups as $g)
        @if($g->goverment === 1)
        <div class="comm__">
        <a href="/community/{{strtolower($g->name)}}" class="comm__blok__">
        @else
        <div class="comm">
        <a href="/community/{{strtolower($g->name)}}" class="comm__blok">
        @endif
                    <p class="comm__blok__title">{{$g->name}}</p>
             </a>
        </div>
        @endforeach
        @else
        <p class="community__emptytext">Je bent momenteel geen lid van een groep</p>
        @endif
    </div> 




@endsection