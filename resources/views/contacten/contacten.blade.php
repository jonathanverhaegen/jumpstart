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




@endsection