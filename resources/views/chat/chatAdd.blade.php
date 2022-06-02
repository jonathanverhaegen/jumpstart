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

        <div class="addPost addPost--chat">
            <p class="addPost__title">Bericht sturen naar {{$user->name}}</p>

            <form class="form--post" action="/add/chat" method="post" enctype="multipart/form-data">
                @csrf
    
                <textarea id="myeditorinstance" class="form--post__textarea"  name="tekst" cols="20" rows="5" placeholder="Waar denk je aan..."></textarea>

                <input type="hidden" name="reciever_id" value="{{$user->id}}">
                
                <div class="form__btn">
                    <button class="addPost__btn" type="submit">Stuur</button>
                </div>

            </form>

        </div>

@endsection