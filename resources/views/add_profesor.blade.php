@extends('layouts.app')

@section('main-content')
    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Introducir profesor</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('profesor.index') }}"> Volver</a>
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
                    <form method="post" action="{{route('profesor.store')}}">
                        @csrf
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
                            <label for="surname">Apellidos:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="surname"
                                name="surname"
                                placeholder="surname">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telefono:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="telephone"
                                name="telephone"
                                placeholder="telphone">
                        </div>
                        <div class="form-group">
                            <label for="surname">NIF:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nif"
                                name="nif"
                                placeholder="nif">
                        </div>
                        <div class="form-group">
                            <label for="surname">Email</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="email">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection