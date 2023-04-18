@extends('layouts.main')
@section('title', 'Registrar Usuario')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{ asset('/js/table.js') }}"></script>    
@endSection
@section('main')

<div class="container-fluid my-5">
    <div class="row ">
        <div class="mb-3 col-lg-10 col-md-10 col-sm-10">
            <h1>Usuarios</h1>
        </div>
        <div class="mb-3 col-lg-2 col-md-2 col-sm-2">
            <a type="button" class="btn btn-primary btn-lg" href="{{ route('users-register') }}">Nuevo usuario.</a>
        </div>
    </div>
<table id="users" style="width:100%" class="table table-striped">
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
                        <a href = "{{route('users-edit',$user)}}" type="button" class="btn btn-md btn-secondary"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@section('javascript')
@endSection
@endSection