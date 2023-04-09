@extends('layouts.main')
@section('title', 'Registrar Usuario')
@section('main')

<div class="uk-flex uk-flex-right uk-margin-left">
        @can('deleteUser')
        <button class="btn btn-primary btn-lg" type="button">Eliminar</button>
        @endcan
</div>
@include('user.modal')

<form action="" method="POST" class="was-validated">
@csrf
    <div class="col-12">
            <label for="id" class="form-label">Id</label>
            <div class="input-group">
            <input type="hidden" class="form-control" id="id" name="id" placeholder="" required>
            </div>
    </div>
@include('users.form')
</form>