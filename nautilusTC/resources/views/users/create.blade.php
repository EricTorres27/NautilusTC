@extends('layouts.main')
@section('title', 'Registrar Usuario')
@section('main')


<form action="{{ route('users-register-save')}}" method="POST">
    @csrf
    @include('user.form')
</form>

@section('js')
<script src="{{asset('/js/validator.js')}} "></script>
@endSection
@endSection

