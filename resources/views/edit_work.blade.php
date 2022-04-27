@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Editar trabajo</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('classroom.index') }}"> Volver</a>
                    </div>
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
                    <form method="post" action="{{route('works.update',$work->id_work)}}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="id_student">Estudiante:</label>
                            <select
                                class="form-control"
                                id="id_student"
                                name="id_student"
                                placeholder="id_student">
                                @foreach($students as $student)
                                <option value="{{$student->id}}"
                                @if ($work->id_student==$student->id)
                                 selected="selected" 
                                @endif
                                >{{$student->name}}</option>
                @endforeach
</select>
                        </div>
                        <div class="form-group">
                            <label for="name">Asignatura:</label>
                            <select
                                type="text"
                                class="form-control"
                                id="id_class"
                                name="id_class"
                                placeholder="id_class">
                                @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id_class}}"
                            @if ($work->id_class==$classroom->id_class)
                                 selected="selected" 
                                @endif
                            >{{$classroom->name}}</option>
                @endforeach
</select>  
                        </div>
                        <div class="form-group">
                            <label for="Name">Nombre:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="name"
                                value="{{$work->name}}"
                                >
                        </div>
                        <div class="form-group">
                            <label for="Status">Nota:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="mark"
                                name="mark"
                                placeholder="mark"
                                value="{{$work->mark}}"
                                >
                        </div>
  
                        <button type="submit" class="btn btn-primary">Modificar trabajo
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection