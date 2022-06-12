@extends('layouts/app')

@section('title', 'Community')

@section('content')


    <x-head.tinymce-config/>

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




        
        <div class="group__container">
            <div class="group__icon">
                <a href="/community"><img src="{{asset('img/back.png')}}" alt="back" class="__back__icon__"></a>  
                <h1 class="group__title">{{$group->name}}</h1>
            </div>
            <div class="group__blok">
                    <img class="person" src="/attachments/{{$user->avatar}}" alt="{{$user->name}}" >
                @if(!empty($users))
                @foreach($users as $user)
                
                    @if($user->isAgent === 0)
                    <a href="/profiel/{{$user->id}}"><img class="person" src="/attachments/{{$user->avatar}}" alt="{{$user->name}}" ></a>
                    @else
                    <a href="/contacten/{{$user->id}}"><img class="person" src="/attachments/{{$user->avatar}}" alt="{{$user->name}}" ></a>
                    @endif
                @endforeach
                @endif
            </div>
        </div>

        <div class="faq__container">
        <h1 class="faq__title">FAQ {{$group->name}}</h1>
            
            @foreach($faqs as $faq)
            <div class="faq">
                <div class="faq__blok">
                    <p class="question">{{$faq->question}}</p>
                    <img src="{{asset('img/uitklappen.png')}}" alt="fold" class="fold__icon">
                </div>
                <div class="faq__answer">
                <p>{!! $faq->answer !!}</p>
            </div>
            </div>
            @endforeach

        <a href="/community/addFaq/{{$group->id}}" class="ask"><p class="ask__question">Vraag stellen</p></a>  
        </div>

        <div id="addPost" class="addPost">
            <p class="addPost__title">Post plaatsen</p>

            <form class="form--post" action="/add/post" method="post" enctype="multipart/form-data">
                @csrf
    
                <textarea id="myeditorinstance" class="form--post__textarea"  name="tekst" cols="30" rows="10" placeholder="Waar denk je aan..."></textarea>

                <input class="form--post__files" type="file" name="files[]" accept='.png, .jpg, .jpeg, .pfd, .doc, .docx, .ppt' multiple>
                
                <input type="hidden" name="group_id" value="{{$group->id}}">
                
                <div class="form__btn">
                    <button class="addPost__btn" type="submit">Post plaatsen</button>
                </div>

            </form>

        </div>

        @foreach($posts as $post)
        <div class="post">
            <div class="post__user">
                <img class="post__user__img" src="/attachments/{{$post->user->avatar}}" alt="">
                <div class="post__user__info">
                    <p class="post__user__info__name">{{$post->user->name}}</p>
                    <p class="post__user__info__date">{{ date('d/m/Y H:i:s', strtotime($post->created_at))}}</p>
                </div>
            </div>
            <div class="post__text">
                <p>{!!$post->text!!}</p>
            </div>
            @if(!empty($post->attachments[0]))
            <div class="post__img">
            @foreach($post->attachments as $att)
                @if(str_contains($att->source, "png") || str_contains($att->source, "jpg") || str_contains($att->source, "jpeg"))
                <img src="/attachments/{{$att->source}}" alt="">
                @endif
            @endforeach
            </div>
            @endif

            @if(!empty($post->attachments[0]))
            <div class="post__att">
                @foreach($post->attachments as $att)
                @if(str_contains($att->source, "pdf") || str_contains($att->source, "doc") || str_contains($att->source, "docx") || str_contains($att->source, "ppt"))
                    <a href="/attachments/{{$att->source}}" target="_blank" download>{{$att->name}}</a>
                @endif
                @endforeach
            </div>
            @endif

            <livewire:likes :post_id="$post->id" />
            <livewire:reactions :post_id="$post->id" />

        </div>
        @endforeach





@endsection