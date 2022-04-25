@extends('layouts.app')

@section('main-content')
<script>
    $(document).ready(function() {
    $('#tabla0').DataTable();
} );
</script>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos generales</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Asignaturas impartidas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <h1>{{$profesor->name}} {{$profesor->surname}}</h1>   
  <p>{{$profesor->email}}</p>
  <p>{{$profesor->nif}}</p>
  <p>{{$profesor->telephone}}</p>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h4>Asignaturas impartidas</h4>
                    <table id="tabla0" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id Asignatura</th>
                <th>Nombre</th>
                <th>Color</th>
                
            </tr>
        </thead>
        <tbody>                  
                   @foreach($classes as $clase)
                   <tr>
                   <td>{{$clase->id_class}}</td> 
                   <td><a class="btn btn-info" href="{{ route('classroom.show',$clase->id_class) }}">{{$clase->name}}</a></td> 
                   
                   <td>{{$clase->color}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Id Asignatura</th>
                <th>Nombre</th>
                <th>Color</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>

@endsection