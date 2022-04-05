@extends('layouts.app')
@section('main-content')

    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de cursos</h4>
                </div>
                <a href="{{route('courses.create')}}" class=" btn btn-outline-success mb-2">Añadir Curso</a>

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
                        <th scope="col">Description</th>
                        <th scope="col">Date Start</th>
                        <th scope="col">Date End</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ ++$i}}</th>
                        <td>{{$course->id_course}}</td>
                        <td>{{\Str::limit($course->name, 50)}}</td>
                        <td>{{\Str::limit($course->description, 50)}}</td>
                        <td>{{$course->date_start}}</td>
                        <td>{{$course->date_end}}</td>
                        <td>
                            <form action="{{ route('courses.destroy',$course->id_course) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('courses.show',$course->id_course) }}">Mostrar</a>

                                <a class="btn btn-primary" href="{{ route('courses.edit',$course->id_course) }}">Editar</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                {!! $courses->links() !!}

            </div>
        </div>
    </div>
</div>

@endsection