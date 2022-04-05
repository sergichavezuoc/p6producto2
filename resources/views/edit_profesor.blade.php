@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Laravel 8 Ajax CRUD Tutorial Using Mysql Datatable</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('profesor.index') }}"> Back</a>
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
                    <form method="post" action="{{route('profesor.update',$profesor->id_teacher)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{$profesor->name}}">

                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="surname"
                                name="surname"
                                value="{{$profesor->surname}}">

                        </div>
                        <div class="form-group">
                            <label for="emai">Email:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{$profesor->email}}">

                        </div>
                        <div class="form-group">
                            <label for="emai">NIF:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nif"
                                name="nif"
                                value="{{$profesor->nif}}">

                        </div>
                        <div class="form-group">
                            <label for="emai">Telephone:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="telephone"
                                name="telephone"
                                value="{{$profesor->telephone}}">

                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection