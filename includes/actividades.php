<?php

include("conexion.php");

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
                        <li class="nav-item">
                            <a class="nav-link active" href="../views/user.php">Lista de Usuarios</a>
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
                <h1 class="display-6 text-center">Actividades para Estudiantes PACE</h1>
                <hr class="bg-info">
                <div class="container ms-5">
                    <p class="pb-0 mb-0">Actividades para estudiantes con peligro de desercion universitaria.</p>
                    <p class="text-danger small pt-0 mt-0">*Datos con proteccion sobre divulgacion.</p>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-success" href="../registro_actividad.php">
                                Actividad <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table_id">
                    <tr>
                        <th class="col-md-3 text-center" data-sort="actividad">ACTIVIDAD</th>
                        <th class="col-md-3 text-center" data-sort="descripcion">DESCRIPCION</th>
                        <th class="col-md-3 text-center" data-sort="fecha">FECHA</th>
                        <th class="text-center">ELIMINAR</th>
                        <th class="text-center">EDITAR</th>
                        <th class="text-center">VER</th>
                    </tr>
                    <?php
                    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                    $SQL = "SELECT actividades.id_actividades, actividades.actividad, actividades.descripcion, actividades.fecha
                    FROM actividades";
                    $dato = mysqli_query($conex, $SQL);

                    if ($dato->num_rows >= 1) {
                        while ($fila = mysqli_fetch_array($dato)) {
                    ?>
                            <tr>
                                <td><?php echo $fila['actividad']; ?></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td class="text-center"><?php echo date('d-m-Y', strtotime($fila['fecha'])); ?></td>
                                <td class="text-center"><a class="btn btn-danger" href="../views/eliminar_actividad.php?id=<?php echo $fila['id_actividades'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center"><a class="btn btn-warning" href="../views/editar_actividad.php?id=<?php echo $fila['id_actividades'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td class="text-center"><a class="btn btn-success" href="asistencia.php?id=<?php echo $fila['id_actividades'] ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="16">No existen registros</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <hr>
            <br>
            <div class="col text-center">
                <!--Generamos el documento PDF en otra pagina-->
                <a class="btn btn-success disabled" target="_blank" href="../pdf/pdf.php">Sacar Datos</a>
            </div>
        </div>
    </div>
    </div>
    <br>
    <hr>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/actividades.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/ordenar-actividades.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>