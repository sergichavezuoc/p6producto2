@extends('layouts.app')

@section('main-content')
<script>
    $(document).ready(function() {
    $('#tabla0').DataTable();
    $('#tabla1').DataTable();
    $('#tabla2').DataTable();
} );
</script>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos generales</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cursos matriculados</button>
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
  <h1>{{$student->name}} {{$student->surname}}</h1>   
  <p>{{$student->email}}</p>
  <p>{{$student->nif}}</p>
  <p>{{$student->telephone}}</p>
  <h4>Notas medias</h4>
  <p><b>Examenes</b></p>
  @foreach($notas_examenes as $notas_examen)
  <p>{{$notas_examen->clase}}: {{$notas_examen->media_examenes}}</p>
  @endforeach
  <p><b>Trabajos</b></p>
  @foreach($notas_trabajos as $notas_trabajo)
  <p>{{$notas_trabajo->clase}}: {{$notas_trabajo->media_trabajos}}</p>
  @endforeach

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h4>Cursos matriculados</h4>
                    <table id="tabla0" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                
            </tr>
        </thead>
        <tbody>                  
                   @foreach($users as $curso)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('courses.show',$curso->id_course) }}">{{$curso->name}}</a></td> 
                   <td>{{$curso->date_start}}</td> 
                   <td>{{$curso->date_end}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Curso</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
            </tr>
        </tfoot>
    </table>
</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h4>Notas examenes</h4>
                    <table id="tabla1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Examen</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>                  
                   @foreach($examenes as $examen)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('classroom.show',$examen->id_class) }}">{{$examen->clase}}</a></td> 
                   <td>{{$examen->examen}}</td> 
                   <td>{{$examen->nota}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Asignatura</th>
                <th>Examen</th>
                <th>Nota</th>
            </tr>
        </tfoot>
    </table>
  </div>
  <div class="tab-pane fade" id="trabajos" role="tabpanel" aria-labelledby="trabajos-tab">
  <h4>Notas trabajos</h4>
                    <table id="tabla2" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Trabajo</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>                  
                   @foreach($trabajos as $trabajo)
                   <tr>
                   <td><a class="btn btn-info" href="{{ route('classroom.show',$trabajo->id_class) }}">{{$trabajo->clase}}</a></td> 
                   <td>{{$trabajo->trabajo}}</td> 
                   <td>{{$trabajo->nota}}</td> 
                   </tr>  
                   @endforeach
                    
                   </tbody>
        <tfoot>
            <tr>
            <th>Clase</th>
                <th>Trabajo</th>
                <th>Nota</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>

 

               <div class="col-md-12">
               <form method="post" action="/classroom/addExam">
               @csrf
               <input type="hidden" name="id_student" value="{{$student->id}}" />
               <button type="submit" class="btn btn-primary">Entrar examen</button>
                </form>
                </div>
                <div class="col-md-12">
                    <br />
               <form method="post" action="/classroom/addWork">
               @csrf
               <input type="hidden" name="id_student" value="{{$student->id}}" />
               <button type="submit" class="btn btn-primary">Entrar trabajo</button>
                </form>
                </div>

      
    </div>

@endsection