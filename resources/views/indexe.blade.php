@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de inscripciones</h4>
                </div>
                <a href="{{route('enrollment.create')}}" class=" btn btn-outline-success mb-2">Nueva inscripción</a>

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
                        <td>{{$enrollment-> students -> name}}</td>
                        <td>{{$enrollment-> courses -> name}}</td>
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


            </div>
        </div>
    </div>
</div>

@endsection