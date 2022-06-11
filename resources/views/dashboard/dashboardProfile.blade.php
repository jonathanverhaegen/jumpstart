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


<div class="dashboard__profile">
        <div class="profile__container__">
            <div class="profile__container__base">
            <a href="/dashboard" ><img class="profile__back" src="/img/pijl_nieuw.png" alt="terug"></a>
                <div class="profile">
                        <div class="profile__img">
                        <img class="profile__pic" src="/attachments/{{$user->avatar}}" alt="profile pic">
                        </div>

                        
                        <div class="profile__extra">
                            <p class="profile__name">{{$user->name}}</p>
                            @if(!empty($user->company->name))
                            <p class="profile__business">{{$user->company->name}}</p>
                            @endif
                            @if($user->id !== Auth::id())
                                <div class="profile__extra__icons">
                                    @if(!empty($user->company->phone))
                                    <a href="" ><img src="{{asset('img/tel.png')}}" alt="call" class="profile__icon3"></a>
                                    @endif
                                    <a href="mailto:{{$user->email}}" ><img src="{{asset('img/mail.png')}}" alt="mail" class="profile__icon1"></a>
                                    <a href="/chat/addConversation/{{$user->id}}" ><img src="{{asset('img/chatting.png')}}" alt="chat" class="profile__icon2"></a>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div> 


        <div class="profile__info__container">
            <div class="profile__bio">
                @if(!empty($user->education_id))
                <p class="profile__info__title"> Opleiding</p>
                <p class="profile__info__inhoud">{{$user->education->title}}</p>
                @endif
                <p class="profile__info__title">Bio</p>

                <p class="profile__info__inhoud">
                    {{$user->bio}}
                </p>
                <div class="profile__social__icons">
                <a href="" ><img src="{{asset('img/behance.png')}}" alt="behance" class="social__icon3"></a>
                <a href="" ><img src="{{asset('img/fb.png')}}" alt="call" class="social__icon3"></a>
                <a href="" ><img src="{{asset('img/linkedin.png')}}" alt="call" class="social__icon3"></a>
                </div>

            </div>
         </div>
        @if($user->id === Auth::id())
         <a href="/instellingen" class="profile__edit"><p class="profile__edit__">Profiel wijzigen</p></a> 
        @endif
</div>



@endsection