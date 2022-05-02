@extends('layouts.app')

@section('main-content')
<script>
    $(document).ready(function() {
    $('#tabla0').DataTable();
    $('#tabla1').DataTable();
    $('#tabla2').DataTable();
} );
</script>
<div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
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
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="trabajos-tab" data-bs-toggle="tab" data-bs-target="#trabajos" type="button" role="tab" aria-controls="trabajos" aria-selected="false">Notas trabajos</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <h1>{{$classroom->name}}</h1>   
  <p>Profesor: {{$classroom->id_teacher}}</p>
  <p>Horario: {{$classroom->id_schedule}}</p>
  <p>Nombre clase: {{$classroom->name}}</p>
  <p>Color:{{$classroom->color}}</p> 
  <p>Porcentaje evaluacion continua {{$percentage->continuous_assessment}}</p>
  <p>Porcentaje examenes {{$percentage->exams}}</p> 
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
                   <td><a class="btn btn-info" href="{{ route('students.show',$user->id) }}">{{$user->nombre}}</a></td> 
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
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>                  
                   @foreach($examenes as $examen)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('students.show',$examen->id) }}">{{$examen->nombre}} {{$examen->apellido}}</a></td> 
                   <td>{{$examen->examen}}</td> 
                   <td>{{$examen->nota}}</td> 
                   <td><a class="btn btn-primary" href="{{ route('exams.edit',$examen->id_exam) }}">Modificar</a></td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Estudiante</th>
                <th>Examen</th>
                <th>Nota</th>
                <th>Editar</th>
            </tr>
        </tfoot>
    </table>
  </div>
  <div class="tab-pane fade" id="trabajos" role="tabpanel" aria-labelledby="trabajos-tab">
  <h4>Notas trabajos</h4>
                    <table id="tabla2" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Trabajo</th>
                <th>Nota</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>                  
                   @foreach($trabajos as $trabajo)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('students.show',$trabajo->id) }}">{{$trabajo->nombre}} {{$trabajo->apellido}}</a></td> 
                   <td>{{$trabajo->trabajo}}</td> 
                   <td>{{$trabajo->nota}}</td> 
                   <td><a class="btn btn-primary" href="{{ route('works.edit',$trabajo->id_work) }}">Modificar</a></td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Estudiante</th>
                <th>Trabajo</th>
                <th>Nota</th>
                <th>Editar</th>
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
               <br />
               <div class="col-md-12">
               <form method="post" action="/classroom/addWork">
               @csrf
               <input type="hidden" name="id_class" value="{{$classroom->id_class}}" />
               <button type="submit" class="btn btn-primary">Entrar trabajo</button>
                </form>
               </div>
 

@endsection