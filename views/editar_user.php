<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();
}

include("../includes/conexion.php");

// Captura el id seleccionado.
$id = $_GET['id'];
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conex, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Registros</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body id="page-top">
    <form action="../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <!--Nav de Prueba-->
                <nav class="navbar navbar-expand-lg bg-opacity-10">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="../includes/inicio.php">Estudiantes</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="./user.php">Lista de Usuarios</a>
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
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['password']; ?>" required>

                            </div>

                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number" id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector.." value="<?php echo $usuario['rol']; ?>" required>
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <br>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="user.php" class="btn btn-danger">Cancelar</a>

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