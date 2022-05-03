@extends('layouts.app')
@section('main-content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Gestión de profesores</h4>
                </div>
                <a href="{{route('profesor.create')}}" class=" btn btn-outline-success mb-2">Añadir profesor</a>

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

                    @foreach($profesores as $profesor)
                    <tr>
                        <th scope="row">{{ ++$i}}</th>
                        <td>{{$profesor->id_teacher}}</td>
                        <td>{{\Str::limit($profesor->name, 50)}}</td>
                        <td>{{\Str::limit($profesor->surname, 50)}}</td>
                        <td>{{\Str::limit($profesor->email, 50)}}</td>
                        <td>
                            <form action="{{ route('profesor.destroy',$profesor->id_teacher) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('profesor.show',$profesor->id_teacher) }}">Mostrar</a>

                                <a class="btn btn-primary" href="{{ route('profesor.edit',$profesor->id_teacher) }}">Editar</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                {!! $profesores->links() !!}

            </div>
        </div>
    </div>
</div>

@endsection