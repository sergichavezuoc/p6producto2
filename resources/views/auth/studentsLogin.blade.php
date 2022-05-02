<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acceso de Estudiante</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column mb-5">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">PHProgrammer Accademy&nbsp;&nbsp;&nbsp;&nbsp;</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="/">Inicio</a>
        <a class="nav-link" href="/admin/login">Administrador</a>
        <a class="nav-link active" href="/students/login">Estudiante</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
  <form class="form-signin" method="post" action="{{ route('students.login') }}">
    @csrf
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Acceso estudiante</h1>
      @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
      <label for="inputEmail" class="sr-only">Nombre de usuario</label>
      <input type="username" id="username" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
      <a href="/students/register" class="link-primary">Darse de alta</a><br />
      </div>
      <button class="btn btn-lg btn-primary btn-block" style="background-color:#000;border-color:#000" type="submit">Validar</button>
    </form>
  </main>

  <footer class="mastfoot mt-auto">
  </footer>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
