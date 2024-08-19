
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>

    <title>Registros</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos/estilo17.css">
</head>
<body id="page-top">
    <form action="./includes/validar.php" method="POST">
        <div id="login">
            <div class="container">
                <!--Nav de Prueba-->
                <nav class="navbar navbar-expand-lg bg-opacity-10">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./includes/inicio.php">Estudiantes</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="./views/user.php">Lista de Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="../index.php">Agregar Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="../includes/login.php">Salir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Registro de nuevo estudiante</h3>
                            <div class="form-group">
                                <label for="rut" class="form-label">Rut: *</label>
                                <input type="text" id="rut" name="rut" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre Completo: *</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="carrera" class="form-label">Carrera: *</label>
                                <input type="text" id="carrera" name="carrera" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="cohorte">Cohorte: *</label><br>
                                <input type="number" name="cohorte" id="cohorte" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="situacion_academica" class="form-label">Situacion Academica *</label>
                                <input type="text" id="situacion_academica" name="situacion_academica" class="form-control" placeholder="" required>

                            </div>
                            <div class="form-group">
                                <label for="ingreso">Modo de Ingreso: *</label><br>
                                <input type="text" name="ingreso" id="ingreso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cod_carrera">Codigo de Carrera: *</label><br>
                                <input type="number" name="cod_carrera" id="cod_carrera" class="form-control" required>
                            </div>
                            <br>
                            <div class="btn-group mx-auto d-block text-center" role="group" aria-label="Basic mixed styles example">
                                <button type="reset" name="limpiar" value="Limpiar" class="btn">Limpiar</button>
                                <input type="submit" value="Guardar" class="btn btn-success" name="reg_estudiante">
                                <a href="./includes/inicio.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>