@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
<h5 text-align: center>Hola {{Auth::guard('students')->user()->name}},</h5>

<h2>Configura tu perfil como lo desees. </h2>
    <br>
    @if($incidencesCount)
    <div class="alert alert-warning">Tiene <a href="/student/incidences">{{$incidencesCount}} respuestas</a> a incidencias sin leer</diV>
    @endif
    <div class="alert alert-info">Aquí podrás hacer modificación del nombre de usuario, correo electrónico y contraseña.</div>
    <div class="alert alert-info">En la opción calendario, puedes visualizar las siguientes clases</div>
    <div class="alert alert-info">En la opción expediente, puedes visualizar tus notas por asignaturas y divididas en trabajos y exámenes</div>
    <div class="alert alert-info">En tu perfil, puedes activar o desactivar las alertas que quieres recibir cuando se introduzcan notas de exámenes, trabajos y evaluación continua</div>

      
            @endsection

