@extends('layouts/app')

@section('title', 'Server error | Jumpstart')

<style>
    html, body {
        height: 100%;
        width: 100%;
    }
</style>

@section('content')

<div class="error-page">
    <img src="https://app.jumpstartvlaanderen.be/img/illustration-error.png" alt="Niet gevonden" class="error-page__illustration">
    <h1>500</h1>
    <h2>Server error</h2>
    <a href="/dashboard" class="error-page__button">Ga terug naar Jumpstart</a>
</div>

@endsection