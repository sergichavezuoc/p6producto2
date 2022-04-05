@extends('layouts.app')

@section('main-content')

    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Ficha del curso</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <h1>{{$course->name}}</h1>
                </div>
               <div class="col-md-12">
                   <p>{{$course->description}}</p>
               </div>

            </div>
        </div>
    </div>

@endsection