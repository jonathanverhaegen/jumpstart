@extends('layouts/app')

@section('title', 'Registreer als student')

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

        @if($flash = session('message'))
        @component('components/notification')
        @slot('type') message @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif



    <div class="signup__container">
        <img class="ill__su__s" src="/img/ill_signup_s.png" alt="illustration">
        <div>
            <h1 class="h__signup__s">Word nu student-zelfstandige!</h1>
            <form class="form--signup" action="/user/addStudent" method="post" class="" enctype="multipart/form-data">
      @csrf
      
        <div class="form__avatar">
            <img class="sz__pic" src="/img/default.png" alt="profile pic">
            <label class="__prof__sz"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profiel foto wijzigen</label>
        </div>
      
        
        <input class="signup__input" type="text" name="naam" placeholder="Naam en voornaam" value="{{ old('naam') }}">
        

        
        <input class="signup__input"  type="date" name="geboortedatum" placeholder="Geboortedatum" value="{{ old('geboortedatum') }}">
        

        
        <input class="signup__input"  type="text" name="email" placeholder="Studentenmail" value="{{ old('email') }}">
    

        <div class="passwordToggle">
            <input  id="pass" class="signup__input signup__input--pass" type="password" name="wachtwoord" placeholder="Wachtwoord" value=""><img class="togglePass--signup" src="{{asset('img/verborgen.png')}}" alt="toggle"></input>
        </div>

        <div class="passwordToggle">
            <input  id="pass" class="signup__input signup__input--pass" type="password" name="wachtwoord_confirmation" placeholder="Wachtwoord bevestigen" value=""><img class="togglePass--signup" src="{{asset('img/verborgen.png')}}" alt="toggle"></input>
        </div>
        
      
    <div class="form__btn form__btn--signup">
        <button class="reg__student" type="submit">Registreer</button>
    </div>
      
      </form>
        </div>



    </div>

      
    
        
    

      




@endsection