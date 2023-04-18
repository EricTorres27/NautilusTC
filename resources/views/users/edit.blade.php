@extends('layouts.main')
@section('title', 'Editar Usuario')
@section('main')


<div class="container-fluid my-5">
    <h1>Editar Usuario</h1>
    <p class="lead">Edite los valores del usuario.</p>
    <form class="was-validated" action="{{ route('users-update', $prevAnswers['id'])}}" method="POST">
        @csrf
        @include('users.editForm')
    </form>
</div>


@section('javascript')
<script src="{{asset('/js/validator.js')}}"></script>
@endSection
@endSection