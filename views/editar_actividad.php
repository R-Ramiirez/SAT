<?php

include("../includes/conexion.php");

$id = $_GET['id'];
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$SQL = "SELECT actividades.id_actividades, actividades.actividad, actividades.descripcion, actividades.fecha
FROM actividades
WHERE id_actividades = $id;";
$dato = mysqli_query($conex, $SQL);
$usuario = mysqli_fetch_assoc($dato);
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Editar estudiante</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo17.css">
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
                            <h3 class="text-center">Editar Actividad</h3>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="fecha">Fecha: *</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $usuario['fecha']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="actividad" class="form-label">Nombre Actividad: *</label>
                                <input type="text" id="actividad" name="actividad" class="form-control" value="<?php echo $usuario['actividad']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="form-label">Descripcion: *</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $usuario['descripcion']; ?>" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="hidden" name="accion" value="editar_actividad">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a class="btn btn-danger" href="../includes/actividades.php?id=<?php echo $usuario['id_actividades'] ?>">Cancelar</a>
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