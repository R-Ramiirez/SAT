<?php

include("conexion.php");

// Captura el id seleccionado.
$id = $_GET['id'];
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$SQL = "SELECT *, estudiantes.nombre, estudiantes.carrera
FROM asistencia
INNER JOIN estudiantes ON estudiantes.rut = asistencia.rut 
INNER JOIN actividades ON actividades.id_actividades = asistencia.id_actividad
WHERE id_actividad = $id;";
$dato = mysqli_query($conex, $SQL);
$usuario = mysqli_fetch_assoc($dato);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Actividades con los Estudiantes PACE</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo17.css">
</head>

<body>
    <div class="container">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg bg-opacity-10">
            <div class="container-fluid">
                <a class="navbar-brand" href="inicio.php">Lista de Estudiantes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="./actividades.php">Actividades</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuarios
                            </a>
                            <div class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../views/user.php">Lista de Usuarios</a>
                                <a class="dropdown-item" href="../index.php">Agregar Nuevo Usuario</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container w-75">
            <div class="row justify-content-center mt-2 pt-2">
                <h1 class="display-6 text-center"><?php echo $usuario['actividad']; ?></h1>
                <hr class="bg-info">
                <p class="pb-0 mb-0"><?php echo $usuario['descripcion']; ?></p>
                <p class="col text-end"><?php echo date('d-m-Y', strtotime($usuario['fecha'])); ?></p>
                <p class="text-danger small pt-0 mt-0">*Datos con proteccion sobre divulgacion.</p>
                <div class="container">
                    <table id="tablaAsistencia" class="table_id">
                        <thead>
                            <tr>
                                <th class="col text-center" data-sort="rut">RUT</th>
                                <th class="col" data-sort="nombre">NOMBRE DE LOS PARTICIPANTES</th>
                                <th class="col" data-sort="carrera">CARRERA</th>
                                <th class="col text-center" data-sort="asistencia">ASISTENCIA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Agrega este log para ver cuántos registros se están recuperando
                            error_log("Número de registros: " . $dato->num_rows);

                            if ($dato && $dato->num_rows > 0) {
                                // Reinicia el puntero interno del resultado
                                mysqli_data_seek($dato, 0);

                                $i = 0;
                                while ($usuario = mysqli_fetch_assoc($dato)) {
                                    // Agrega este log para ver cada registro que se está procesando
                                    error_log("Procesando registro " . ($i + 1) . ": " . json_encode($usuario));
                            ?>
                                    <tr data-id="<?php echo htmlspecialchars($usuario['rut']); ?>">
                                        <td class="text-center"><?php echo htmlspecialchars($usuario['rut']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['carrera']); ?></td>
                                        <td style="text-align: center;">
                                            <?php if ($usuario['asistencia'] == 1) { ?>
                                                <i class="fa-regular fa-square-check fa-2x"></i>
                                            <?php } else { ?>
                                                <i class="fa-regular fa-square fa-2x"></i>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                // Agrega este log para ver cuántos registros se procesaron realmente
                                error_log("Total de registros procesados: " . $i);
                            } else {
                                ?>
                                <tr class="text-center">
                                    <td colspan="4">No existen registros</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        </div>
    </div>
    <br>
    <div class="col text-center">
        <a href="actividades.php" class="btn btn-primary">Volver
            <i class="fa-solid fa-circle-left"></i></a>
        <!--Generamos el documento PDF en otra pagina-->
        <a class="btn btn-success disabled" target="_blank" href="../pdf/pdf.php">Sacar Datos</a>
        <!-- no edita la asistencia -->
        <a class="btn btn-warning disabled" href="../views/editar_asistencia.php?id=<?php echo $id ?>">Editar
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <br>
    <hr>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/actividades.js"></script>
    <script src="../js/acciones.js"></script>
    <script src="../js/ordenar-asistencia.js"></script>
    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    </div>
</body>

</html>