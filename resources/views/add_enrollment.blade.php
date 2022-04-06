@extends('layouts.app')

@section('main-content')
    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Añadir enrollment</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('enrollment.index') }}"> Back</a>
                    </div>
                </div>
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Please input properly!!!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <form method="post" action="{{route('enrollment.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="id_student">Estudiante:</label>
                            <select
                                class="form-control"
                                id="id_student"
                                name="id_student"
                                placeholder="id_student">
                                @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
</select>
                        </div>
                        <div class="form-group">
                            <label for="name">Curso:</label>
                            <select
                                type="text"
                                class="form-control"
                                id="id_course"
                                name="id_course"
                                placeholder="id_course">
                                @foreach($courses as $course)
                            <option value="{{$course->id_course}}">{{$course->name}}</option>
                @endforeach
</select>  
                        </div>
                        <div class="form-group">
                            <label for="Status">Estado:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="status"
                                name="status"
                                placeholder="status">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Add enrollment</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection