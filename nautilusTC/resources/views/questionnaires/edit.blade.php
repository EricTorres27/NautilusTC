@extends('layouts.main')
@section('title', 'Cuestionario')
@section('css')
@section('main')

<div class="container-fluid my-5">
    <h1>Cuesitonario</h1>
    <p class="lead">Responde las preguntas según lo que consideres</p>
    <form class="was-validated" action="{{ route('questionnaires-update', $prevAnswers['id'])}}" method="POST">
        @csrf
        @include('questionnaires.editForm')
    </form>
</div>

@endSection
@endSection