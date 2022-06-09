@extends('layouts/app')

@section('title', 'Dashboard')

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
                            <p class="dash__name">Hi {{ explode(" ", $user->name)[1] }} </p>
                            <p class="dash__mess">Wij hebben <strong class="strong-dash">nieuwe ondernemingstips</strong> voor jou</p>
                        </div>
                        <div class="dash__img">
                        <a href="dashboard/profile"><img class="dash__pic" src="/attachments/{{$user->avatar}}" alt="profile pic"></a>
                        </div>

                </div>
            </div>
        </div> 
    
        <div class="dash__container__cal">

            <div class="calendar__heading">
                <span class="month"></span>
                <div class="calendar__buttons">
                    <img src="./img/arrow-calendar.svg" alt="Terug" id="calendar-back">
                    <img src="./img/arrow-calendar.svg" alt="Verder" id="calendar-forward">
                </div>
            </div>
            <div class="calendar__names">
                <span>ma</span>
                <span>di</span>
                <span>wo</span>
                <span>do</span>
                <span>vr</span>
                <span>za</span>
                <span>zo</span>
            </div>
            <img src="./img/loading.gif" alt="Loading..." class="calendar__loading">
            <div class="days"></div>
            
        </div>

        <div class="dash__container__chat">
            <p class="dash__chat">Berichten</p>

            @foreach($chats as $chat)
                @if($chat->user_one === $user->id)
                
                    <a class="dash__chat__item" href="/chat">
                        <img class="chat__pic" src="/attachments/{{$chat->usertwo->avatar}}" alt="chat pic">
                        <div class="dash__chat__text">
                            <p class="dash__chat__name">{{$chat->usertwo->name}}</p>
                            <p class="dash__chat__mess">{{substr($chat->chats[count($chat->chats)-1]->text,0,20)}}</p>
                        </div>
                    </a>
                
                @else
                    <a class="dash__chat__item" href="/chat">
                        <img class="chat__pic" src="/attachments/{{$chat->userone->avatar}}" alt="chat pic">
                        <div class="dash__chat__text">
                            <p class="dash__chat__name">{{$chat->userone->name}}</p>
                            <p class="dash__chat__mess">{{substr($chat->chats[count($chat->chats)-1]->text,0,20)}}</p>
                        </div>
                    </a>
                @endif
            
            @endforeach

        </div>

        
             
        <livewire:todos :user_id="$user->id"/>
        

        <div class="dash__container__par">
            <p class="dash__par"> Parameters</p>

                    <img class="green1" src="/img/orange.png" alt="status"></a>
                <p class="par__titel"> Sociale bijdrage</p>

                <hr class="stripe">
                    
                    <img class="green" src="/img/red.png" alt="status"></a>
                <p class="par__titel"> Fiscaal ten laste</p>
                    
                <hr class="stripe">

                    <img class="green" src="/img/green.png" alt="status"></a>
                <p class="par__titel"> Belastingen</p>
                
                <hr class="stripe">

                    <img class="green" src="/img/orange.png" alt="status"></a>
                <p class="par__titel"> Kinderbijslag</p>

                <div class="par__detail">
                    <div class="child child-11">---</div>
                    <div class="child child-1">---</div>

                    <div class="child child-12">---</div>
                    <div class="child child-2">---</div>

                    <div class="child child-13">---</div>
                    <div class="child child-3">---</div>

                    <div class="child child-14">---</div>
                    <div class="child child-4">---</div>

                    <p class="par__sb">€ 4.329,22/ <br> € 7.329,22</p>

                    
                    
                    <p class="par__ftl">€ 490/<br> € 3.490,00</p>
                    <p class="par__b">€ 6.050/ <br> € 9.050</p>
                    <p class="par__kb">€ 4.329,22/ <br>  € 7.329,22</p>
                </div>


        </div>
    
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment-with-locales.min.js" integrity="sha512-vFABRuf5oGUaztndx4KoAEUVQnOvAIFs59y4tO0DILGWhQiFnFHiR+ZJfxLDyJlXgeut9Z07Svuvm+1Jv89w5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection