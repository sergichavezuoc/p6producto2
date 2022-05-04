<!DOCTYPE html>
<html>
    <head>
        <title>Aplicación de Gestión Escolar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <style>
          .nav-link{color:#000;font-weight:bolder};
          .navbar navbar-expand-lg navbar-light bg-light {background-color:#f5dbdb!important;};
        </style>
      </head>
    <body>

    <header class="site-header">  
        <div class="barra" style="margin-top:20px;margin-left:20px">
            <p class="logoTitle"><b>PHP</b>rogrammer <b>Academy</b></p>

        </div>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 0.5px;padding-bottom: 1px;background-color:#000000!important">


<div class="collapse navbar-collapse" style="background-color:#f5e1da;" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    @if (Auth::guard('admin')->check())
    <li class="nav-item">
      <a class="nav-link" href="/admin/dashboard">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('students.index') }}">Estudiantes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profesor.index') }}">Profesores</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('courses.index') }}">Cursos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('enrollment.index') }}">Inscripciones</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('classroom.index') }}">Clases y horarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.logout') }}">Desconectar</a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="/students/dashboard">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('usuarios.index') }}">Calendario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/students/expediente">Expediente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('usuarios.edit',Auth::guard('students')->user()->id) }}">Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/students/cursos">Cursos</a>
    </li>
    <li>
    <form method="get" action="{{ route('admin.logout') }}">
                        @csrf
            
                            <button type="submit" class="btn">Desconectar</button>
                    </form>
</li>
@endif
  </ul>

</div>
</nav>
<style type="text/css">
    .container{
        margin-top:30px;
    }
    h4{
        margin-bottom:20px;
    }
</style>
<body>
    <div class="container">
        @yield('main-content')
    </div>
</body>

</html>