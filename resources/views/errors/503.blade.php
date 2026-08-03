@extends('errors.layout')

@section('title', '503 Service Unavailable')
@section('status', 'Error 503')

@section('content')
    <h1>Servicio no disponible</h1>
    <p>Estamos realizando mantenimiento. Vuelve a intentarlo en unos minutos.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
