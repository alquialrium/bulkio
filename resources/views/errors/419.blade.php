@extends('errors.layout')

@section('title', '419 Page Expired')
@section('status', 'Error 419')

@section('content')
    <h1>Sesion expirada</h1>
    <p>Tu sesion caducó. Recarga la pagina e intenta de nuevo.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
