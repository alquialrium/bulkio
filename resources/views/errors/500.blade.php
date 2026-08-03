@extends('errors.layout')

@section('title', '500 Server Error')
@section('status', 'Error 500')

@section('content')
    <h1>Error interno del servidor</h1>
    <p>Ocurrió un problema inesperado. Intenta nuevamente en unos momentos.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
