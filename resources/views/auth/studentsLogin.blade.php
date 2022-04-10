<!DOCTYPE html>
<html>
    <head>
        <title>Neumorphism/Soft UI</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Validacón de estudiantes</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <form method="post" action="{{ route('students.login') }}">
                        @csrf
                        <div class="row mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="usrname" name="username" placeholder="Usuario">
                                    <label for="usernmane">Nombre de usuario</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                    <label for="pass">Password</label>
                                <button type="submit" class="btn">Validar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>