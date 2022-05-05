@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">id incidencia</th>
      <th scope="col">id estudiante</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Respuesta</th>
      <th scope="col">Responder</th>
    </tr>
  </thead>
  
@if($incidences)
@foreach($incidences as $incidence)

<tbody>
    <tr>
      <th scope="row">{{$incidence->id_incidence}}</th>
      <td>{{$incidence->id_student}}</td>
      <td>{{$incidence->description}}</td>
      <td>{{$incidence->response}}</td>
      @if($incidence->response == "")
      <td><a  class="btn btn-light btn-sm" href="/admin/response/{{{$incidence->id_incidence}}}"/>Responder</a></td>
      @else
      <td></td>
      @endif
    </tr>
  </tbody>
@endforeach
</table>
@else
echo "No tiene historial de incidencias"
@endif
@endsection
