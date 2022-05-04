@extends('layouts.app')
@section('main-content')
@if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="list-group" style="max-width:400px">
                    @foreach($courses as $course)
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">     
                    <h5 class="mb-1">{{$course->name}}</h5>
                    <small>{{$course->date_start}} | {{$course->date_end}}</small> 
                    </div>
                    <p class="mb-1">{{$course->description}}</p>  
                    @php
                    $matricula='0'
                    @endphp
                    @foreach($student as $matriculado)
                    @if($matriculado->id_course == $course->id_course)
                    matriculado
                    @php
                    $matricula='1'                   
                    @endphp            
                    @endif
                    @endforeach
                    @if($matricula=='0')
                    <form method="POST" action="/students/cursos">
                        @csrf
                        <input type="hidden" name="id_course" value="{{$course->id_course}}"/>
                        <input type="submit" value="Matricular"/>
                    </form>
                    @endif
                    </a>        
                    @endforeach  
                    </div>
                    
                        
@endsection