@extends('layouts.main')
@section('title', 'Sesiones')
@section('css')

@endSection
@section('main')
<div class="container-fluid my-5">
    <h1>Datos de la sesión</h1>
    <p class="lead">Por favor, ingrese los datos de la sesión.</p>
    <div class="col-sm-12 col-md-10 col-lg-12">
        <div class="alert alert-warning text-center" role="alert" id="validationList"></div>
        <div class="row g-3">
            <div class="col-sm-12 col-md-10 col-lg-12">
                <label for="date" class="form-label">Creada el:</label>
                <input type="text" class="form-control" id="word_count" placeholder="date" name = "date" disabled required value="@if(!empty($prevAnswers['created_at'])) {{$prevAnswers['created_at']}} @endif">
            </div>  
            <div class="col-sm-12 col-md-10 col-lg-12">
                <label for="format" class="form-label">Modalidad de la sesión</label>
                <select class="form-select" id="format" name="format" required aria-label="select format" disabled>
                    <option value="">-</option>
                    <option value="Remoto" @if('Remoto' == $prevAnswers['format']) selected @endif>Remoto</option>
                    <option value="Prescencial" @if('Prescencial' == $prevAnswers['format']) selected @endif>Prescencial</option>
                </select>
                <div class="invalid-feedback">
                        Elija un formato
                </div>
            </div>
            @foreach ($participants as $participant)
                <div class="col-sm-6">
                    <label for="idNumber" class="form-label">Participante</label>
                    <input type="text" class="form-control" id="idNumber" placeholder="Matricula" name = "idNumber" disabled required
                        value="{{$participant->name}}">
                </div>
            @endforeach
            <div class="col-sm-6">
                <label for="idNumber" class="form-label">Duración</label>
                <div class="mb-3 col-lg-auto col-md-auto col-sm-12">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-clock fa-lg"></i></span>
                        <input disabled type="text" aria-label="First name" class="form-control" value="@if(!empty($prevAnswers['durationHours'])) {{$prevAnswers['durationHours']}} @else 0 @endif">
                        <input disabled type="text" aria-label="First name" class="form-control" value="@if(!empty($prevAnswers['durationMinutes'])) {{$prevAnswers['durationMinutes']}} @else 0 @endif">
                        <input disabled type="text" aria-label="First name" class="form-control" value="@if(!empty($prevAnswers['durationSeconds'])) {{$prevAnswers['durationSeconds']}}@else 0 @endif">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="word_count" class="form-label">Palabras:</label>
                <input type="number" class="form-control" id="word_count" placeholder="Palabras" name = "word_count" disabled required value="@if(!empty($prevAnswers['wordCount'])) {{$prevAnswers['wordCount']}} @endif">
            </div>              
            <div class="col-sm-12 text-center">
                <button onclick="window.history.back()" type="button" class="w-50 btn btn-primary btn-lg">Regresar</button>
            </div>
        </div>
    </div>
</div>
@section('javascript')
@endSection
@endSection