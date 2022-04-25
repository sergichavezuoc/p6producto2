@extends('layouts.app')

@section('main-content')
<script>
    $(document).ready(function() {
    $('#tabla0').DataTable();
    $('#tabla1').DataTable();
} );
</script>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos generales</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Estudiantes matriculados</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Asignaturas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<h1>{{$course->name}}</h1>   
  <p>{{$course->description}}</p>
  <p>{{$course->date_start}}</p>
  <p>{{$course->date_end}}</p>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h4>Estudiantes Matriculados</h4>
                    <table id="tabla0" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>                  
                   @foreach($users as $user)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('students.show',$user->id) }}">{{$user->nombre}}</a></td> 
                   <td>{{$user->surname}}</td> 
                   <td>{{$user->email}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
            </tr>
        </tfoot>
    </table>
</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="trabajos-tab">
  <h4>Asignaturas</h4>
                    <table id="tabla1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Asignatura</th>
                <th>Nombre</th>
                <th>Color</th>
                
            </tr>
        </thead>
        <tbody>                  
                   @foreach($clases as $clase)
                   <tr>
                   <td>{{$clase->id_class}}</td> 
                   <td><a class="btn btn-info" href="{{ route('classroom.show',$clase->id_class) }}">{{$clase->clase}}</a></td> 
                  <td>{{$clase->color}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>ID Asignatura</th>
                <th>Nombre</th>
                <th>Color</th>
            </tr>
        </tfoot>
    </table>

</div>
    </div>

@endsection