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
                    <h4>Añadir Trabajo</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('classroom.index') }}"> Volver</a>
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
                    <form method="post" action="/classroom/storeWork">
                        @csrf
                        <div class="form-group">
                            <label for="id_class">Clase:</label>
                            <select
                                class="form-control"
                                id="id_class"
                                name="id_class"
                                placeholder="Clase">
                                @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id_class}}"
                            @if ($request->id_class==$classroom->id_class)
                            selected="selected"
                            @endif
                            >{{$classroom->name}}</option>
                @endforeach
</select>
                        </div>
                        <div class="form-group">
                            <label for="id_student">Estudiante:</label>
                            <select
                                class="form-control"
                                id="id_student"
                                name="id_student"
                                placeholder="id_student">
                                @foreach($students as $student)
                            <option value="{{$student->id}}"
                            @if ($request->id_student==$student->id)
                            selected="selected"
                            @endif
                            >{{$student->name}}</option>
                @endforeach
</select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre del trabajo:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="name">
                                
                        </div>
                        <div class="form-group">
                            <label for="mark">Nota:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="mark"
                                name="mark"
                                placeholder="Nota">
                        </div>
 
                        
                        <button type="submit" class="btn btn-primary">Añadir trabajo</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection