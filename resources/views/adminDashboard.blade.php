@extends('layouts.app')
@section('main-content')
      
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Página principal de administrador</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="container">
                        Esta es la pagina principal para gestionar nuestro centro académico
</div>
                    <form method="get" action="{{ route('admin.logout') }}">
                        @csrf
                        <div class="row mt-3">
                            <button type="submit" class="btn">Desconectar</button>
                        </div>
                    </form>
                </div>
            </div>
      
            @endsection