@extends('layouts.main')
@section('title', 'Inicio')
@section('css')
  <link src="{{asset('/css/dashboard.css')}} " />
@endSection
@section('main')
<!---->

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card shadow  text-center text-white bg-dark  mb-3 h-100">
      <div class="card-header"><h2> Sesiones prescenciales</h2></div>
      <div class="card-body">
        <p class="card-text display-4">10</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow  text-center text-white bg-dark  mb-3 h-100">
      <div class="card-header"><h2>Sesiones remotas</h2></div>
      <div class="card-body">
        <p class="card-text display-4">10</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow  text-center text-white bg-dark  mb-3 h-100">
      <div class="card-header"><h2> Promedio-T por sesión</h2></div>
      <div class="card-body">
        <p class="card-text display-4">10</p>
      </div>
    </div>
  </div>
</div>
<canvas class="my-4 w-100" id="myChart" width="900" height="300"></canvas>
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="{{asset('/js/dashboard.js')}}"></script>
@endSection
@endSection