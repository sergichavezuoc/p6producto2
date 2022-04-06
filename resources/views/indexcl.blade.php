@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de classes</h4>
                </div>
                <a href="{{route('classroom.create')}}" class=" btn btn-outline-success mb-2">Añadir Clase</a>

                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <table class="table border">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Hora Ini</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Dia</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($classrooms as $classroom)
                    <tr>
                        <td>{{$classroom->id_classroom}}</td>
                        <td>{{$classroom->id_teacher}}</td>
                        <td>{{$classroom->id_course}}</td>
                        <td>{{$classroom->time_start}}</td>
                        <td>{{$classroom->time_end}}</td>
                        <td>{{$classroom->time_day}}</td>
                        <td>
                            <form action="{{ route('classroom.destroy',$classroom->id_classroom) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('classroom.show',$classroom->id_classroom) }}">Mostrar</a>

                                <a class="btn btn-primary" href="{{ route('classroom.edit',$classroom->id_classroom) }}">Editar</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                {!! $classrooms->links() !!}

            </div>
        </div>
    </div>
</div>

@endsection