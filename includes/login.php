<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../estilos/login5.css">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <form action="_functions.php" method="POST">
        <div class="container" id="box">
            <div class="abs-center">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <center>
                            <div class="text-center">
                                <img src="/Prueba/includes/img/umag.jpeg" class="rounded-circle" alt="...">
                            </div>
                            <br>
                                <h2 class="text-center">Iniciar Sesión</h2>
                                <br>
                                <div class="ingreso form-group">
                                    <label class="text-start" for="correo">Usuario:</label><br>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <br>
                                <div class="ingreso form-group">
                                    <label class="text-start" for="password">Contraseña:</label><br>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <input type="hidden" name="accion" value="acceso_user">
                                </div>
                                <div class="form-group">
                                    <br>
                                        <input type="submit" class="btn btn-success" value="Ingresar">
                                    </center>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>