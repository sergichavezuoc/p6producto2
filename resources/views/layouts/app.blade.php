<!DOCTYPE html>
<html>
    <head>
        <title>Aplicación de Gestión Escolar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
      <a class="nav-link" href="/">Inicio</a>
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
      <a class="nav-link" href="{{ route('enrollment.index') }}">Enrollment</a>
    </li>
  </ul>

</div>
</nav>
<style type="text/css">
    .container{
        margin-top:10px;
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