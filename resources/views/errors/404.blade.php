@extends('layouts/app')

@section('title', 'Pagina niet gevonden | Jumpstart')

<style>
    html, body {
        height: 100%;
        width: 100%;
    }
</style>

@section('content')

<div class="error-page">
    <img src="img/illustration-error.png" alt="Niet gevonden" class="error-page__illustration">
    <h1>404</h1>
    <h2>Pagina niet gevonden</h2>
    <a href="/dashboard" class="error-page__button">Ga terug naar Jumpstart</a>
</div>

@endsection