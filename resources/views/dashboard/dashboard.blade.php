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
                            <p class="dash__name">Hi {{ explode(" ", $user->name)[1] }} </p>
                            <p class="dash__mess">Wij hebben <strong>nieuwe ondernemingstips</strong> voor jou</p>
                        </div>
                        <div class="dash__img">
                        <a href="dashboard/profile"><img class="dash__pic" src="/attachments/{{$user->avatar}}" alt="profile pic"></a>
                        </div>

                </div>
            </div>
        </div> 
    
        <div class="dash__container__cal">
            <p class="dash__cal"> Kalender</p>
            <p class="cal__today"> 13</p>
            <p class="cal__month"> Dec 2021</p>
            
            <hr class="stripe__cal">   
            
            <div class="cal__grid">     
            <p class="cal__days"> ma</p>
            <p class="cal__days"> di</p>
            <p class="cal__days"> wo</p>
            <p class="cal__days"> do</p>
            <p class="cal__days"> vr</p>
            <p class="cal__days"> za</p>
            <p class="cal__day"> zo</p>

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

            @foreach($chats as $chat)
                @if($chat->user_one === $user->id)
                    <a href=""><img class="chat__pic" src="/attachments/{{$chat->usertwo->avatar}}" alt="chat pic"></a>
                    <p class="dash__chat__name">{{$chat->usertwo->name}}</p>
                    <p class="dash__chat__mess">Hey Jacob, met welke stap van de roadmap ben jij bezig?</p>
                @else
                    <a href=""><img class="chat__pic" src="/attachments/{{$chat->userone->avatar}}" alt="chat pic"></a>
                    <p class="dash__chat__name">{{$chat->userone->name}}</p>
                    <p class="dash__chat__mess">Hey Jacob, met welke stap van de roadmap ben jij bezig?</p>
                @endif
            
            @endforeach

            


        </div>

        <div class="dash__container__not">
        <img class="not__pic" src="/img/tgl_btn.png" alt="toggle"></a>
            <p class="dash__not"> Notificaties</p>
                @foreach($todos as $todo)
                <div class="dash__not__">
                    <img class="not__check" src="/img/unchecked.png" alt="checkbox"></a>
                    <p class="not__titel">{{$todo->title}}</p>
                    <p class="not__mess">{{$todo->text}}</p>
                </div>
                @endforeach
                
        </div>

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




@endsection