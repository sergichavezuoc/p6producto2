<!DOCTYPE html>
<html>
    <head>
        <title>Aplicación de Gestión Escolar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            .form-control,
            .form-control:focus,
            .btn {
                border-radius: 50px;
                background: #e0e0e0;
                box-shadow: 20px 20px 60px #bebebe,
                    -20px -20px 60px #ffffff;
            }
        </style>
    </head>
    <body>
    <header class="site-header">  
        <div class="barra">
            <p class="logoTitle"><b>PHP</b>rogrammer <b>Academy</b></p>

        </div>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="gestion.php">Inicio</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Nuevo
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="nuevo_curso.php">Curso</a>
        <a class="dropdown-item" href="nuevo_asignatura.php">Asignatura</a>
        <a class="dropdown-item" href="nuevo_profesor.php">Profesor</a>
        <a class="dropdown-item" href="nueva_clase.php">Clase</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Consultar
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="listado.php?tabla=students&tipo=Estudiantes">Listado Estudiantes</a>
        <a class="dropdown-item" href="listado.php?tabla=courses&tipo=Cursos">Listado Cursos</a>
        <a class="dropdown-item" href="listado.php?tabla=teachers&tipo=Profesores">Listado Profersores</a>
        <a class="dropdown-item" href="listado.php?tabla=class&tipo=Clases">Listado Clases</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.logout') }}">Desconectar</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Eliminar
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="eliminar_curso.php">Curso</a>
        <a class="dropdown-item" href="eliminar_asignatura.php">Asignatura</a>
        <a class="dropdown-item" href="eliminar_profesor.php">Profesor</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Modificar
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="modificar_curso.php">Curso</a>
        <a class="dropdown-item" href="modificar_clase.php">Clase</a>
        <a class="dropdown-item" href="modificar_profesor.php">Profesor</a>
    </li>
  </ul>

</div>
</nav>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Panel de Administrador</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <form method="get" action="{{ route('admin.logout') }}">
                        @csrf
                        <div class="row mt-3">
                            <button type="submit" class="btn">Desconectar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>