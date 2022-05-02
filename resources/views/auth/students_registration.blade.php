
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
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="form-signin" method="POST" action="{{ route('students.postregistration') }}">
            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registro de estudiante</h1>
            <!-- Name -->
            
            
            <label for="name" class="sr-only">Nombre</label>

                <input id="name" class="form-control" type="text" name="name" value=""  placeholder="Nombre" required autofocus />
            
            <!-- Surname -->
            <label for="surname" class="sr-only">Apellido</label>

                <input id="surname" class="form-control" type="text" name="surname" value="" placeholder="Apellido" required />
            
            <!-- Email Address -->
            <label for="email" class="sr-only">Email</label>

                <input id="email" class="form-control" type="email" name="email" value="" placeholder="Password" required />
            
            <!-- Username -->
            <label for="username" class="sr-only">Nombre de usuario</label>

                <input id="username" class="form-control" type="text" name="username" value="" placeholder="Nombre de usuario" required />
            

                <label for="telephone" class="sr-only">Teléfono</label>

                <input id="telephone" class="form-control" type="text" name="telephone" value="" placeholder="Teléfono" required />
            
                        <!-- Nif -->
                       
                <label for="nif" class="sr-only">Nif</label>

                <input id="nif" class="form-control" type="text" name="nif" value="" placeholder="Nif" required />
            
                
            <!-- Password -->
            
            <label for="password" class="sr-only">Password</label>

                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="new-password" />
  <label for="password_confirmation" class="sr-only">Repite el password</label>

                <input id="password_confirmation" class="form-control"
                                type="password"
                                placeholder="Repite el password"
                                name="password_confirmation" required />
 

               <div class="checkbox mb-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/students/login">
                   Ya estás registrado?
                </a>
                </div>
 
                <button class="btn btn-lg btn-primary btn-block" style="background-color:#000;border-color:#000" type="submit">Registrarse</button>
            
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
