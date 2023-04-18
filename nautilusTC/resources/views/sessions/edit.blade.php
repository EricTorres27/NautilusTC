@extends('layouts.main')
@section('title', 'Editar Sesión')
@section('main')

<div class="container-fluid my-5">
    <h1>Editar Sesión</h1>
    <p class="lead">Edite los valores de la sesión.</p>
    <form class="was-validated" action="{{ route('sessions-update', $prevAnswers['id'])}}" method="POST">
        @csrf
        @include('sessions.editForm')
    </form>
</div>

@endSection