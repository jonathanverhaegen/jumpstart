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





      
    <h1 class="h__reg__sz">Vertel meer over jezelf</h1>
      <form action="user/addZelfstandige" method="post" class="form__sz">
      @csrf

      <h1 class="h__signup__sz">Word lid van onze <br>community</br></h1>


        <img class="sz__pic" src="/img/thomas.png" alt="profile pic">
        <a href="" class="a__prof__sz" ><p class="__prof__sz">Profiel foto wijzigen</p></a>
      
        <div class="">
        <input class="mail__sz" type="text" name="email" placeholder="Bedrijfsmail" value="">
        </div>

        <div class="">
        <input class="pass__sz" type="text" name="phone" placeholder="Telefoonnummer" value="">
        </div>

        <div class="">
        <input class="name__sz" type="text" max="2000" name="bio" placeholder="Bio" value="">
        </div>


        
        
        <img class="togglePunt3" src="/img/ill__sz__3.png" alt="punt">
    
    </form>
      
    <div class="reg__sz">
        <a href="/signup/student-zelfstandige/profile" class="__reg__sz" type="submit"><p>Registreren afronden</p></a>
    </div>
      

    



@endsection