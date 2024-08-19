<?php

include("../includes/conexion.php");

// Captura el id seleccionado.
$id = $_GET['id'];
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$SQL = "SELECT asistencia.id_actividad, asistencia.rut, estudiantes.nombre, asistencia.asistencia, actividades.actividad, estudiantes.carrera, actividades.descripcion, actividades.id_actividades
FROM asistencia
INNER JOIN estudiantes ON estudiantes.rut = asistencia.rut 
INNER JOIN actividades ON actividades.id_actividades = asistencia.id_actividad
WHERE id_actividad = $id ORDER BY nombre ASC;";
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
                    <div id="login-column" class="col-md-9">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <h1 class="display-6 text-center">Asistencia <?php echo $usuario['actividad']; ?></h1>
                            <br>
                            <br>
                            <table class="table_id">
                                <tr>
                                    <th class="col text-center">RUT</th>
                                    <th class="col-md-3">NOMBRE DE LOS PARTICIPANTES</th>
                                    <th class="col-md-3">CARRERA</th>
                                    <th class="col text-center">ASISTENCIA</th>
                                </tr>
                                <?php
                                if ($dato->num_rows >= 1) {
                                    while ($usuario = mysqli_fetch_array($dato)) {
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $usuario['rut']; ?></td>
                                            <td><?php echo $usuario['nombre']; ?></td>
                                            <td><?php echo $usuario['carrera']; ?></td>
                                            <?php
                                            if ($usuario['asistencia'] == 1) {
                                            ?>
                                                <td style="text-align: center;"><input type="checkbox" name="asistencia_<?php echo $usuario['rut']; ?>" value="1" checked></td>
                                            <?php
                                            } else if ($usuario['asistencia'] == 0) {
                                            ?>
                                                <td style="text-align: center;"><input type="checkbox" name="asistencia_<?php echo $usuario['rut']; ?>" value="0"></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center">
                                        <td colspan="16">No hay participantes anotados</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <br>
                            <div class="align-content-center align-items-center justify-content-center">
                                <div class="form-group">
                                    <input type="hidden" name="accion" value="editar_asistencia">
                                    <input type="hidden" name="id" value="<?php echo $usuario['id_actividad']; ?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Editar</button>
                                    <a class="btn btn-danger" href="../includes/asistencia.php?id=<?php echo $id ?>">Cancelar</a>
                                </div>
                            </div>
                            <br>
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