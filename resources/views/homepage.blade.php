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
            <p class="cal__today"> 13</p>
            <p class="cal__month"> Dec 2021</p>
            
            <hr class="stripe__cal">   
            
            <div class="recht">     
            <p class="cal__days"> ma</p>
            <p class="cal__days"> di</p>
            <p class="cal__days"> wo</p>
            <p class="cal__days"> do</p>
            <p class="cal__days"> vr</p>
            <p class="cal__days"> za</p>
            <p class="cal__days"> zo</p>

            <p class="cal__digit"> 13</p>
            <p class="cal__digit"> 14</p>
            <p class="cal__digit"> 15</p>
            <p class="cal__digit"> 16</p>
            <p class="cal__digit"> 17</p>
            <p class="cal__digit"> 18</p>
            <p class="cal__digit"> 19</p>
            </div>
        </div>

        <div class="dash__container__chat">
            <p class="dash__chat">Berichten</p>
            <a href=""><img class="chat__pic" src="/img/sarahp.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/Laurens.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/kris.png" alt="chat pic"></a>
            <a href=""><img class="chat__pic" src="/img/leuke mensen.png" alt="chat pic"></a>
        </div>

        <div class="dash__container__not">
        <img class="not__pic" src="/img/tgl_btn.png" alt="toggle"></a>
            <p class="dash__not"> Notificaties</p>
                <div class="dash__not__">
                    <img class="not__check" src="/img/unchecked.png" alt="checkbox"></a>
                    <p class="not__titel"> Niet vergeten</p>
                    <p class="not__mess">Donderdag 23 december is de deadline van de belastingaangifte</p>
                </div>
                <div class="dash__not__">
                    <img class="not__check" src="/img/unchecked.png" alt="checkbox"></a>
                    <p class="not__titel"> Ice Cube</p>
                    <p class="not__mess">Een workshop rond de branding van jouw bedrijf.</p>
                </div>
        </div>

        <div class="dash__container__par">
            <p class="dash__par"> Parameters</p>

                    <img class="green1" src="/img/green.png" alt="status"></a>
                <p class="par__titel"> Sociale bijdrage</p>

                <hr class="stripe">
                    
                    <img class="green" src="/img/orange.png" alt="status"></a>
                <p class="par__titel"> Fiscaal ten laste</p>
                    
                <hr class="stripe">

                    <img class="green" src="/img/red.png" alt="status"></a>
                <p class="par__titel"> Belastingen</p>
                
                <hr class="stripe">

                    <img class="green" src="/img/green.png" alt="status"></a>
                <p class="par__titel"> Kinderbijslag</p>

        </div>
    
    </div>




@endsection