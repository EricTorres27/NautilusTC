@extends('layouts.main')
@section('title', 'Sesiones')
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
            <h1>Sesiones</h1>
        </div>
        <div class="mb-3 col-lg-2 col-md-2 col-sm-2">
            <a type="button" class="btn btn-primary btn-lg" href="{{ route('sessions-register') }}">Nueva sesión</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="sessions" style="width:100%" class="table table-striped ">
            <thead>
                <tr>
                    <th>Participantes</th>
                    <th>Formato</th>
                    <th>Fecha</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                <tr>
                    <td>  
                    @foreach($session->users as $user)
                    {{$user->name}}
                    <br>
                    @endforeach
                    </td>
                    <td>{{$session['format']}}</td>
                    <td>{{$session['created_at']}}</td>
                    <td><a href="{{route('sessions-show',$session)}}" type="button" class="btn btn-md btn-secondary"><i class="fa-solid fa-file fa-xl"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@section('javascript')
</div>
@endSection
@endSection