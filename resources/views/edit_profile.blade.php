@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Editar perfil</h4>
                </div>
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <form method="post" action="{{route('usuarios.update',Auth::guard('students')->user()->id)}}">
                        
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estudiante" value="{{Auth::guard('students')->user()->id}}">
                        <div class="form-group">
                            <label for="username">Nombre de usuario:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                value="{{Auth::guard('students')->user()->username}}">

                        </div>
                        <div class="form-group">
                            <label for="emai">Email:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{Auth::guard('students')->user()->email}}">

                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                value="{{Auth::guard('students')->user()->password}}">

                        </div>
                        	
                        <div class="form-group">
                        <label for="work">Notificaciones trabajos: </label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="work" id="work" value="1"
                        @if ($notificaciones->work==1)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault1">
                        Si
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="work" id="work" value="0"
                        @if ($notificaciones->work==0)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault2">
                         No
                        </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="work">Notificaciones examen:</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="exam" id="exam" value="1"
                        @if ($notificaciones->exam==1)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault1">
                        Si
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="exam" id="exam" value="0"
                        @if ($notificaciones->exam==0)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault2">
                         No
                        </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="work">Notificaciones nota evaluacion continua:</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="continuous_assessment" id="continuous_assessment" value="1"
                        @if ($notificaciones->continuous_assessment==1)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault1">
                        Si
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="continuous_assessment" id="continuous_assessment" value="0"
                        @if ($notificaciones->continuous_assessment==0)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault2">
                         No
                        </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="work">Notificaciones nota final:</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="final_note" id="final_note" value="1"
                        @if ($notificaciones->final_note==1)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault1">
                        Si
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="final_note" id="final_note" value="0"
                        @if ($notificaciones->final_note==0)
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="flexRadioDefault2">
                         No
                        </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection