@extends('layouts.app')
@section('main-content')

@foreach($notas as $nota)
<h1>Asignatura: {{$nota->clase}}</h1>
Media examenes: {{$nota->media_examenes}}<br />
Media trabajos: {{$nota->media_trabajos}}<br />

@endforeach
  






  
Expediente
@endsection




