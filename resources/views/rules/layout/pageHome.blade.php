@extends('rules.layout.dashboard')

@section('title' , 'Pagina Principal')

@section('content')

<div class="image-container">
    <img src="{{ asset('img/principal.jpg') }}" alt="" class="full-screen-image">
    <h2 class="centered-text">Bienvenido al sistema</h2>
</div>

@endsection
