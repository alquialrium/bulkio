@extends('errors.layout')

@section('title', '429 Too Many Requests')
@section('status', 'Error 429')

@section('content')
    <h1>Demasiadas solicitudes</h1>
    <p>Has realizado demasiadas solicitudes en poco tiempo. Espera unos minutos e intenta de nuevo.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
