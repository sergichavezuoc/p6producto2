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
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Estudiantes inscritos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Notas examenes</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <h1>{{$classroom->name}}</h1>   
  <p>{{$classroom->id_teacher}}</p>
  <p>{{$classroom->id_schedule}}</p>
  <p>{{$classroom->name}}</p>
  <p>{{$classroom->color}}</p> 
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h4>Alumnos inscritos</h4>
                    <table id="tabla0" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                
            </tr>
        </thead>
        <tbody>                  
                   @foreach($users as $user)
                   <tr>
                   <td>{{$user->nombre}}</td> 
                   <td>{{$user->apellido}}</td> 
                   
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            </tr>
        </tfoot>
    </table>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h4>Notas examenes</h4>
                    <table id="tabla1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Examen</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>                  
                   @foreach($examenes as $examen)
                   <tr>
                   <td>{{$examen->nombre}} {{$examen->apellido}}</td> 
                   <td>{{$examen->examen}}</td> 
                   <td>{{$examen->nota}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Estudiante</th>
                <th>Examen</th>
                <th>Nota</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>
 
               <div class="col-md-12">
               <form method="post" action="/classroom/addExam">
               @csrf
               <input type="hidden" name="id_class" value="{{$classroom->id_class}}" />
               <button type="submit" class="btn btn-primary">Entrar examen</button>
                </form>
               </div>

 

@endsection