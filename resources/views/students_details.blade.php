@extends('layouts.app')

@section('main-content')

    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Ficha de estudiante</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <h1>{{$student->name}}</h1>
                </div>
               <div class="col-md-12">
                   <p>{{$student->surname}}</p>
               </div>
               <div class="col-md-12">
                    <h4>Inscripciones</h4>
                   <p>
                   @foreach($users as $curso)
                   <b>Curso:</b> {{$curso->name}} <b>Fecha inicio:</b> {{$curso->date_start}} <b>Fecha fin:</b> {{$curso->date_end}}<br />
                   @endforeach
                    </p>
               </div>

            </div>
        </div>
    </div>

@endsection