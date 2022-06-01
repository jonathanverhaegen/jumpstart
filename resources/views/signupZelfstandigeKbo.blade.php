@extends('layouts/app')

@section('title', 'Register')

@section('content')

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





      
    <h1 class="h__reg__sz">KBO</h1>
      <form action="/user/addZelfstandige2" method="post" class="form__sz">
      @csrf

      <a href=""><img src="{{asset('img/aanpassen.png')}}" alt="edit" class="edit__icon__"></a>
      <h1 class="h__signup__sz">Word lid van onze community</h1>
      
        <div class="">
        <input class="name__sz" type="text" name="bedrijfsnaam" placeholder="Bedrijfsnaam" value="">
        </div>

        <div class="">
        <input class="date__sz" type="text" name="ondernemingsnummer" placeholder="Ondernemingsnummer" value="">
        </div>

        <div class="">
        <input class="mail__sz" type="text" name="bedrijfsemail" placeholder="Bedrijfsmail" value="">
        </div>

        <div class="">
        <input class="pass__sz" type="number" name="telefoon" placeholder="Telefoonnummer" value="">
        </div>

        <div class="">
        <input class="pass__sz__" type="date" name="opstartdatum" placeholder="Opstartdatum" value="">
        </div>
        
        <img class="togglePunt2" src="/img/ill__sz__2.png" alt="punt">

        <div class="reg__sz">
            <button class="__reg__sz" type="submit">Volgende</button>
        </div>
    
    </form>
      
      

    



@endsection