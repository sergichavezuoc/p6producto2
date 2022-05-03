@extends('layouts.app')
@section('main-content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de estudiantes</h4>
                </div>
                <a href="{{route('students.create')}}" class=" btn btn-outline-success mb-2">Añadir estudiante</a>

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
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($students as $student)
                    <tr>
                        <th scope="row">{{ ++$i}}</th>
                        <td>{{$student->id}}</td>
                        <td>{{\Str::limit($student->name, 50)}}</td>
                        <td>{{\Str::limit($student->surname, 50)}}</td>
                        <td>{{\Str::limit($student->email, 50)}}</td>
                        <td>
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Mostrar</a>

                                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Editar</a>

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