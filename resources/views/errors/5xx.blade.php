@extends('errors.layout')

@section('title', 'Server Error')
@section('status', 'Error de servidor')

@section('content')
    <h1>Problema temporal del servidor</h1>
    <p>Intenta nuevamente en unos minutos.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
