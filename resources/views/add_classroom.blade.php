@extends('layouts.app')

@section('main-content')
<script>
    $(document).ready(function(){
    $('#time').datetimepicker({
    format: 'yyyy-mm-dd'
});
    });
    </script>
    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Añadir clase</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('classroom.index') }}"> Back</a>
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
                    <form method="post" action="{{route('classroom.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="id_teacher">Profesor:</label>
                            <select
                                class="form-control"
                                id="id_teacher"
                                name="id_teacher"
                                placeholder="id_teacher">
                                @foreach($teachers as $teacher)
                            <option value="{{$teacher->id_teacher}}">{{$teacher->name}}</option>
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
                            <label for="name">Nombre:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input
                                type="color"
                                class="form-control"
                                id="color"
                                name="color"
                                placeholder="color">
                        </div>
                        <div class="form-group">
                            <label for="time_start">Hora inicio:</label>
                            <input
                                type="time"
                                class="form-control"
                                id="time_start"
                                name="time_start"
                                placeholder="time_start">
                        </div>
                        <div class="form-group">
                            <label for="time_end">Hora fin:</label>
                            <input
                                type="time"
                                class="form-control"
                                id="time_end"
                                name="time_end"
                                placeholder="time_end">
                        </div>
                        <div class="form-group">
                            <label for="day">Dia:</label>
                            <input
                                type="date"
                                class="form-control"
                                id="day"
                                name="day"
                                placeholder="day">
                        </div>
                        <div class="form-group">
                            <label for="continuous_assessment">Porcentaje evaluacion continua:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="continuous_assessment"
                                name="continuous_assessment"
                                placeholder="Evaluacion continua">
                        </div>
                        <div class="form-group">
                            <label for="exams">Porcentaje examenes:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exams"
                                name="exams"
                                placeholder="Examenes">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add classroom</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection