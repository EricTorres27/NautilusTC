@extends('layouts.main')
@section('title', 'Registrar Sesión')
@section('main')


<div class="container-fluid my-5">
    <h1>Registrar Sesión</h1>
    <p class="lead">Por favor, ingrese los datos de la sesión.</p>
    <form class="was-validated" action="" method="POST" id="sessionForm">
        @csrf
        @include('sessions.form')
    </form>
</div>


    @section('javascript')
    <script src="{{asset('/js/validator.js')}}"></script>
    <script src="{{asset('/js/session.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @endSection
@endSection