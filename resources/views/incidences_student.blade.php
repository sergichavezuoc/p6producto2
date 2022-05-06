@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<h1>Incidencias</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id incidencia</th>
      <th scope="col">id estudiante</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Respuesta</th>
      <th scope="col">Leido</th>
     
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
      <td>
      @if($incidence->response_read_at == NULL)
      <form method="POST" action="/student/incidenceRead">
        @csrf
        <input type="hidden" name="id_incidence" value="{{$incidence->id_incidence}}"/>
        <input type="hidden" name="response_read_at" value="
        @php
        echo date("Y-m-d H:i:s");
        @endphp
        "/>
        <input type="submit" value="marcar leido"/>
      </form>
      @else
      <i class="bib bi-check-lg"></i> LEIDO
      @endif
      </td> 
    </tr>
  </tbody>
@endforeach

</table>
<div style="display:flex; align-items:center; justify-content:center">
<a  class="btn btn-dark btn-lg" style="align-self:center"  href="/student/addIncidence"/>Nueva incidencia</a>
</div>
@else
echo "No tiene historial de incidencias"
@endif
@endsection