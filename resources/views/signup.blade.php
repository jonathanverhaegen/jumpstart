@extends('layouts/app')

@section('title', 'Register')

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





<img class="ill__su" src="/img/ill_signup.png" alt="illustration">   
    <h1 class="h__signup">Maak je keuze</h1>
    <div class="cont__btn__s">
        <a href="/signup/student" class="btn__student">Ik wil student-<br>zelfstandige worden</br></a>
    <div class="cont__btn__sz">   
        <a href="/signup/student-zelfstandige" class="btn__sz">Ik ben al <br>student-zelfstandige</br></a>
    </div>



@endsection