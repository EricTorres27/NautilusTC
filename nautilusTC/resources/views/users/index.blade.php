@extends('layouts.main')
@section('title', 'Registrar Usuario')
@section('css')

@endSection
@section('main')

<div class="container-fluid my-5">
<h1>Usuarios</h1>
<p class="lead">Por favor, ingrese los datos del usuario.</p>
<a href="{{ route('users-register') }}" >Agregar usuario.</a>
<table id="sesiones" style="width:100%" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Matrícula</th>
                    <th>Consentimiento información</th>
                    <th>Consentimiento prácticas</th>
                    <th>Rol</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['rol']}}</td>
                    <td>{{$user['idNumber']}}</td>
                    <td>@if($user['consent_information'])Sí@else No @endif</td>
                    <td>@if($user['consent_practices'])Sí@else No @endif</td>
                    <td>{{$user['rol']}}</td>
                    <td>
                        <a href = "{{route('users-edit',$user)}}" >Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@section('javascript')
</div>
@endSection
@endSection