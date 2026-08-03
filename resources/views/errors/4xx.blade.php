@extends('errors.layout')

@section('title', 'Error')
@section('status', 'Error de cliente')

@section('content')
    <h1>Solicitud no valida</h1>
    <p>La solicitud no pudo completarse.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
