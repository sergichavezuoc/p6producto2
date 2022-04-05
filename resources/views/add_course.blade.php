@extends('layouts.app')

@section('main-content')
    <div class="row mt-1">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Añadir curso</h4>
                </div>
                <div class="col-md-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
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
                    <form method="post" action="{{route('courses.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="description"
                                name="description"
                                placeholder="description">
                        </div>
                        <div class="form-group">
                            <label for="date_start">Date Start:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="date_start"
                                name="date_start"
                                placeholder="date_start">
                        </div>
                        <div class="form-group">
                            <label for="date_start">Date End:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="date_end"
                                name="date_end"
                                placeholder="date_end">
                        </div>
                        <div class="form-group">
                            <label for="active">Active:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="active"
                                name="active"
                                placeholder="active">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Record</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection