@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de cursos</h4>
                </div>
                <a href="{{route('enrollment.create')}}" class=" btn btn-outline-success mb-2">Añadir Curso</a>

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
                        <th scope="col">Estudiante</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{$enrollment->id_enrollment}}</td>
                        <td>{{$enrollment->id_student}}</td>
                        <td>{{$enrollment->id_course}}</td>
                        <td>{{$enrollment->status}}</td>
                        <td>
                            <form action="{{ route('enrollment.destroy',$enrollment->id_enrollment) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('enrollment.show',$enrollment->id_enrollment) }}">Mostrar</a>

                                <a class="btn btn-primary" href="{{ route('enrollment.edit',$enrollment->id_enrollment) }}">Editar</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                {!! $enrollments->links() !!}

            </div>
        </div>
    </div>
</div>

@endsection