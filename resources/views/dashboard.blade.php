@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
<h5 text-align: center>Hola {{Auth::guard('students')->user()->name}},</h5>
<h5>Estás inscrito en los siguientes cursos</h5>
<div class="alert alert-warning">
@foreach($cursos as $curso)
{{$curso->curso}} <br />
@endforeach
</div>
<h2>Configura tu perfil como lo desees. </h2>
    <br>
    <div class="alert alert-info">Aquí podrás hacer modificación del nombre de usuario, correo electrónico y contraseña.</div>
    <div class="alert alert-info">En la opción calendario, puedes visualizar las siguientes clases</div>
    <div class="alert alert-info">En la opción expediente, puedes visualizar tus notas por asignaturas y divididas en trabajos y exámenes</div>
    <div class="alert alert-info">En tu perfil, puedes activar o desactivar las alertas que quieres recibir cuando se introduzcan notas de exámenes, trabajos y evaluación continua</div>

      
            @endsection

