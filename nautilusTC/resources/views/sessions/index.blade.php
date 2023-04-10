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
                    <th>Creado por</th>
                    <th>Compañer@</th>
                    <th>Formato</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                <tr>
                    <td>{{$session->user['name']}}</td>
                    <td>{{$session->helper['name']}}</td>
                    <td>{{$session['format']}}</td>
                    <td>{{$session['created_at']}}</td>
                    <td>
                        <a href = "#" >Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@section('javascript')
</div>
@endSection
@endSection