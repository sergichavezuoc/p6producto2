@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<h1>Respuesta a la incidencia</h1>
{{$id_incidence}}
<form method="POST" action="/admin/addresponse/">
@csrf
<div class="form-group">
    <label for="respuesta">Escriba su respuesta</label>
    <textarea class="form-control" name="response" rows="11"></textarea>
    <input type="hidden" name= "id_incidence" value="{{$id_incidence}}"/>
</div>

<br/>
<input type="submit" class="btn btn-primary mb-2" value="Enviar"/>
</form>

@endsection