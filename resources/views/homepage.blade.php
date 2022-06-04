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


    <div class="dash__container">
        <div class="dash__container__">
            <div class="dash__container__base">
                <div class="dash">
                        <div class="dash__extra">
                            <p class="dash__name"> Hi Thomas!</p>
                            <p class="dash__mess">Wij hebben <strong>nieuwe ondernemingstips</strong> voor jou</p>
                        </div>
                        <div class="dash__img">
                        <a href="dashboard/profile"><img class="dash__pic" src="/img/thomas.png" alt="profile pic"></a>
                        </div>

                </div>
            </div>
        </div> 
    
        <div class="dash__container__cal">
            <p class="dash__cal"> Kalender</p>
        </div>

        <div class="dash__container__not">
            <p class="dash__not"> Notificaties</p>
        </div>

        <div class="dash__container__par">
            <p class="dash__par"> Parameters</p>
        </div>
    
        <div class="dash__container__chat">
            <p class="dash__chat">Berichten</p>
            <a href=""><img class="chat__pic" src="/img/sarahp.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/Laurens.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/kris.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/leuke mensen.png" alt="chat pic"></a>
        </div>
    
    </div>




@endsection