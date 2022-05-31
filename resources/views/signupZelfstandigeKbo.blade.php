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





      
    <h1 class="h__reg__sz">KBO</h1>
      <form action="user/addZelfstandige" method="post" class="form__sz">
      @csrf

      <a href=""><img src="{{asset('img/aanpassen.png')}}" alt="edit" class="edit__icon__"></a>
      <h1 class="h__signup__sz">Word lid van onze <br>community</br></h1>
      
        <div class="">
        <input class="name__sz" type="text" name="name" placeholder="Bedrijfsnaam" value="">
        </div>

        <div class="">
        <input class="date__sz" type="text" name="number" placeholder="Ondernemingsnummer" value="">
        </div>

        <div class="">
        <input class="mail__sz" type="text" name="email" placeholder="Bedrijfsmail" value="">
        </div>

        <div class="">
        <input class="pass__sz" type="text" name="phone" placeholder="Telefoonnummer" value="">
        </div>

        <div class="">
        <input class="pass__sz__" type="date" name="date start" placeholder="Opstartdatum" value="">
        </div>
        
        <img class="togglePunt2" src="/img/ill__sz__2.png" alt="punt">
    
    </form>
      
    <div class="reg__sz">
        <a href="/signup/student-zelfstandige/profile" class="__reg__sz" type="submit"><p>Volgende</p></a>
    </div>
      

    



@endsection