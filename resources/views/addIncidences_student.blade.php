@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
<div class="alert alert-success" >
    <p>{{ $message }}</p>
</div>
@endif
<h1>Envio de incidencias</h1>
<form method="POST" action="/student/newIncidence">
@csrf
<div class="form-group">
<label>Describe tu consulta</label>
<textarea class="form-control" name="description" rows="5"></textarea>
<br/>
<input class="btn btn-dark btn-lg"  style="align-self:center" type="submit" value="Enviar"/>
</form>
@endsection