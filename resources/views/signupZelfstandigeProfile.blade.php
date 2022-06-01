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





      
    <h1 class="h__reg__sz">Vertel meer over jezelf</h1>
      <form action="/user/addZelfstandige3" method="post" class="form__sz">
      @csrf

      <h1 class="h__signup__sz">Word lid van onze community</h1>

        <div class="form__avatar">
        <img class="sz__pic" src="/img/thomas.png" alt="profile pic">
        <label class="__prof__sz"><input class="avatar" name="avatar" type="file" accept=".png, .jpg, .jpeg"/>Profiel foto wijzigen</label>
        </div>

        <div class="">
        <input class="pass__sz" type="text" max="2000" name="bio" placeholder="Bio" value="">
        </div>

        <img class="togglePunt3" src="/img/ill__sz__3.png" alt="punt">

        <div class="reg__sz">
            <button class="__reg__sz" type="submit">Volgende</button>
        </div>
    
    </form>
      
    
      

    



@endsection