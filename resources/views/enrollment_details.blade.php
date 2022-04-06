@extends('layouts.app')

@section('main-content')

    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Ficha del enrollment</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('enrollment.index') }}"> Back</a>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <h1>Estudiante: {{$enrollment->id_student}} - {{$student->name}}</h1>
                </div>
               <div class="col-md-12">
                   <p>Curso: {{$enrollment->id_course}} - {{$course->name}}</p>
               </div>

            </div>
        </div>
    </div>

@endsection