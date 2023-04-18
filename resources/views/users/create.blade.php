@extends('layouts.main')
@section('title', 'Registrar Usuario')
@section('main')


<div class="container-fluid my-5">
    <h1>Registrar Usuario</h1>
    <p class="lead">Por favor, ingrese los datos del usuario.</p>
    <form class="was-validated" action="" method="POST">
        @csrf
        @include('users.form')
    </form>
</div>


@section('javascript')
<script src="{{asset('/js/validator.js')}}"></script>
@endSection
@endSection

