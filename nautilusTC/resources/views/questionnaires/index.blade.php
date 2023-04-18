@extends('layouts.main')
@section('title', 'Cuestionarios')
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
            <h1>Cuestionarios</h1>
        </div>
    </div>
    <div class="table-responsive">
      <table id="questionnaires" style="width:100%" class="table table-striped ">
          <thead>
              <tr>
                  <th>Creador</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Detalles</th>
              </tr>
          </thead>
          <tbody>
              @foreach($questionnaires as $questionnaire)
              <tr>
                  <th>{{$questionnaire->user->name}}</th>
                  <td>{{$questionnaire['created_at']}}</td>
                  @if($questionnaire['answered'])
                    <td><h3><span class="badge bg-success">Contestado</span></h3></td>
                    <td><a href = "{{route('questionnaires-show',$questionnaire)}}" type="button" class="btn btn-md btn-secondary"><i class="fa-solid fa-file fa-xl"></i></a></td>
                  @else
                    <td><h3><span class="badge bg-warning text-dark">Sin contestar</span></h3></td>
                    <td><a href = "{{route('questionnaires-edit',$questionnaire)}}" type="button" class="btn btn-md btn-secondary"><i class="fa-solid fa-file fa-xl"></i></a></td>
                  @endif
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
@section('javascript')
</div>
@endSection
@endSection