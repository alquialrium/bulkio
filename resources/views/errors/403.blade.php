@extends('errors.layout')

@section('title', '403 Forbidden')
@section('status', 'Error 403')

@section('content')
    <h1>Acceso denegado</h1>
    <p>No tienes permisos para acceder a este recurso.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
