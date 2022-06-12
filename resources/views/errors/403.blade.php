@extends('layouts/app')

@section('title', 'Toegang geweigerd | Jumpstart')

<style>
    html, body {
        height: 100%;
        width: 100%;
    }
</style>

@section('content')

<div class="error-page">
    <img src="img/illustration-error.png" alt="Niet gevonden" class="error-page__illustration">
    <h1>403</h1>
    <h2>Toegang geweigerd</h2>
    <a href="/dashboard" class="error-page__button">Ga terug naar Jumpstart</a>
</div>

@endsection