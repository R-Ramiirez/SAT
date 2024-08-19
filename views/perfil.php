<?php

include("../includes/conexion.php");

// Captura el id seleccionado.
$id = $_GET['id'];
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$consulta = "SELECT estudiantes.*, docentes.*, retencion.*, carreras.*, vulnerabilidad.*, asignatura.*
FROM estudiantes
LEFT JOIN carreras ON estudiantes.carrera = carreras.carrera
LEFT JOIN retencion ON carreras.cod_carrera = retencion.cod_carrera
LEFT JOIN docentes ON carreras.cod_carrera = docentes.cod_carrera
LEFT JOIN vulnerabilidad ON estudiantes.liceo = vulnerabilidad.liceos
LEFT JOIN asignatura ON estudiantes.rut = asignatura.rut
WHERE estudiantes.id = $id;";

$resultado = mysqli_query($conex, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Ver Datos estudiante</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo17.css">
</head>

<body id="page-top">
    <?php
    include("../includes/conexion.php");
    ?>
    <form>
        <div id="login">
            <div class="container">
                <!--Nav de Prueba-->
                <nav class="navbar navbar-expand-lg bg-opacity-10">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="lector.php">Estudiantes</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="../includes/login.php">Salir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                <h3 class="text-center">Ver estudiante</h3>
                <br>
                <div class="row g-3">
                    <div class="col-auto align-text-top">
                        <label for="estado" class="col-form-label">Estado de Alerta:</label>
                    </div>
                    <?php
                    $alerta = 0;
                    // Calculos
                    if ($usuario['vulnerabilidad'] > 70) {

                        $estado = $alerta + 1;
                    } else {

                        $estado = $alerta + 0;
                    }
                    ?>
                    <?php

                    //Fin de calculos
                    if ($estado == 1) {
                    ?>
                        <div class="col-auto">
                            <label type="alerta" id="alerta" class="form-control bg-warning text-bg-black">Alerta Inicial</label>
                        </div>
                        <!--
                        <?php
                        // revisar y Centrar
                        ?>
                        <div class="col-auto align-content-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="col-auto">
                            <label type="alerta" id="alerta" class="form-control bg-warning text-bg-black">Alerta Inicial</label>
                        </div>
                        --->
                    <?php
                    } else if ($estado == 0) {
                    ?>
                        <div class="col-auto">
                            <label type="alerta" id="alerta" class="form-control bg-success text-bg-secondary">Sin Alerta</label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <hr>
                <div class="row g-3" id="vista">
                    <div class="col">
                        <label for="rut" class="form-label col-md-3">Rut: </label>
                        <label class="form-control"><?php echo $usuario['rut']; ?></label>
                    </div>
                    <div class="col">
                        <label for="nombre" class="form-label">Nombre: </label>
                        <label class="form-control"><?php echo $usuario['nombre']; ?></label>
                    </div>
                    <div class="col">
                        <label for="cohorte" class="form-label">Año de Cohorte: </label>
                        <label class="form-control"><?php echo $usuario['cohorte']; ?></label>
                    </div>
                    <hr>
                    <div class="col">
                        <label for="carrera" class="form-label">Carrera: </label>
                        <label class="form-control"><?php echo $usuario['carrera']; ?></label>
                    </div>
                    <div class="col">
                        <label for="cod_carrera" class="form-label">Codigo de Carrera: </label>
                        <label class="form-control"><?php echo $usuario['cod_carrera']; ?></label>
                    </div>
                    <div class="col">
                        <label for="observaciones" class="form-label">Observaciones: </label>
                        <label class="form-control"><?php echo $usuario['observaciones']; ?></label>
                    </div>
                    <hr>
                    <div class="col">
                        <label for="gratuidad" class="form-label">Gratuidad: </label>
                        <label class="form-control"><?php echo $usuario['gratuidad']; ?></label>
                    </div>
                    <div class="col">
                        <label for="ingreso" class="form-label">Modo de Ingreso: </label>
                        <label class="form-control"><?php echo $usuario['ingreso']; ?></label>
                    </div>
                    <div class="col">
                        <label for="situacion_academica" class="form-label">Situacion Academica: </label><br>
                        <label class="form-control"><?php echo $usuario['situacion_academica']; ?></label>
                    </div>
                    <?php
                    // Calcular el porcentaje
                    $porcenvul = $usuario['porcentaje'];
                    ?>
                    <div class="col">
                        <label for="vulnerabilidad" class="form-label">Porcentaje de Retencion: </label>
                        <div class="progress bg-light" style="height: 35px;">
                            <div id="barra-progreso" class="progress-bar bg-danger" style="width: <?php echo $porcenvul; ?>%;"><?php echo $porcenvul; ?>%</div>
                        </div>
                    </div>
                    <hr>
                    <div class="col">
                        <label for="lenguaje" class="form-label">Lenguaje: </label>
                        <label class="form-control"><?php echo $usuario['lenguaje']; ?></label>
                    </div>
                    <div class="col">
                        <label for="matematica" class="form-label">Matematica: </label>
                        <label class="form-control"><?php echo $usuario['matematica']; ?></label>
                    </div>
                    <div class="col">
                        <label for="historia" class="form-label">Historia: </label>
                        <label class="form-control"><?php echo $usuario['historia']; ?></label>
                    </div>
                    <div class="col">
                        <label for="ciencias" class="form-label">Ciencias: </label>
                        <label class="form-control"><?php echo $usuario['ciencias']; ?></label>
                    </div>
                    <div class="col">
                        <label for="ranking" class="form-label">Ranking: </label>
                        <label class="form-control"><?php echo $usuario['ranking']; ?></label>
                    </div>
                    <hr>
                    <div class="col">
                        <label for="liceo" class="form-label">Liceo PACE del Estudiante: </label>
                        <label class="form-control"><?php echo $usuario['liceos']; ?></label>
                    </div>
                    <?php
                    // Calcular el porcentaje
                    $porcentaje = $usuario['vulnerabilidad'];
                    ?>
                    <div class="col">
                        <label for="vulnerabilidad" class="form-label">Porcentaje de Vulnerabilidad: </label>
                        <div class="progress bg-light" style="height: 35px;">
                            <div id="barra-progreso" class="progress-bar bg-danger" style="width: <?php echo $porcentaje; ?>%;"><?php echo $porcentaje; ?>%</div>
                        </div>
                    </div>
                    <hr>
                    <h5>Primer Semestre:</h5>
                    <div class="col">
                        <label for="asig_t1" class="form-label">Asignaturas Totales:</label>
                        <label class="form-control"><?php echo $usuario['asig_t1']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r1" class="form-label">Asignaturas Reprobadas:</label>
                        <label class="form-control"><?php echo $usuario['asig_r1']; ?></label>
                    </div>
                    <?php
                    if ($usuario['asig_t1'] > 0) {
                        // Calcular el porcentaje
                        $porcentaje1 = ((- ($usuario['asig_r1'] * 100) / $usuario['asig_t1']) + 100);
                        $int_cast1 = (int)$porcentaje1;
                    ?>
                        <div class="col">
                            <label for="asig_r1" class="form-label">Porcentaje de Aprobacion: </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar bg-success" style="width: <?php echo $int_cast1; ?>%;"><?php echo $int_cast1; ?>%</div>
                            </div>
                        </div>;
                    <?php
                    } else {
                    ?>
                        <div class="col">
                            <label for="asig_r1" class="form-label">Sin Asignaturas Inscritas </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar"> </div>
                            </div>
                        </div>;
                    <?php
                    }
                    ?>
                    <h5>Segundo Semestre:</h5>
                    <div class="col">
                        <label for="asig_t2" class="form-label">Asignaturas Totales:</label>
                        <label class="form-control"><?php echo $usuario['asig_t2']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r2" class="form-label">Asignaturas Reprobadas:</label>
                        <label class="form-control"><?php echo $usuario['asig_r2']; ?></label>
                    </div>
                    <?php
                    if ($usuario['asig_t2'] > 0) {
                        // Calcular el porcentaje
                        $porcentaje2 = ((- ($usuario['asig_r2'] * 100) / $usuario['asig_t2']) + 100);
                        $int_cast2 = (int)$porcentaje2;
                    ?>
                        <div class="col">
                            <label for="asig_r2" class="form-label bg-light">Porcentaje de Aprobacion: </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar bg-success" style="width: <?php echo $int_cast2; ?>%;"><?php echo $int_cast2; ?>%</div>
                            </div>
                        </div>;
                    <?php
                    } else {
                    ?>
                        <div class="col">
                            <label for="asig_r2" class="form-label">Sin Asignaturas Inscritas</label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar"> </div>
                            </div>
                        </div>;
                    <?php
                    }
                    ?>
                    <h5>Tercer Semestre:</h5>
                    <div class="col">
                        <label for="asig_t3" class="form-label">Asignaturas Totales:</label>
                        <label class="form-control"><?php echo $usuario['asig_t3']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r3" class="form-label">Asignaturas Reprobadas:</label>
                        <label class="form-control"><?php echo $usuario['asig_r3']; ?></label>
                    </div>
                    <?php
                    if ($usuario['asig_t3'] > 0) {
                        // Calcular el porcentaje
                        $porcentaje3 = ((- ($usuario['asig_r3'] * 100) / $usuario['asig_t3']) + 100);
                        $int_cast3 = (int)$porcentaje3;
                    ?>
                        <div class="col">
                            <label for="asig_r3" class="form-label bg-light">Porcentaje de Aprobacion: </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar bg-success" style="width: <?php echo $int_cast3; ?>%;"><?php echo $int_cast3; ?>%</div>
                            </div>
                        </div>;
                    <?php
                    } else {
                    ?>
                        <div class="col">
                            <label for="asig_r3" class="form-label">Sin Asignaturas Inscritas </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar"> </div>
                            </div>
                        </div>;
                    <?php
                    }
                    ?>
                    <h5>Cuarto Semestre:</h5>
                    <div class="col">
                        <label for="asig_t4" class="form-label">Asignaturas Totales:</label>
                        <label class="form-control"><?php echo $usuario['asig_t4']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r4" class="form-label">Asignaturas Reprobadas:</label>
                        <label class="form-control"><?php echo $usuario['asig_r4']; ?></label>
                    </div>
                    <?php
                    if ($usuario['asig_t4'] > 0) {
                        // Calcular el porcentaje
                        $porcentaje4 = ((- ($usuario['asig_r4'] * 100) / $usuario['asig_t4']) + 100);
                        $int_cast4 = (int)$porcentaje4;
                    ?>
                        <div class="col">
                            <label for="asig_r4" class="form-label bg-light">Porcentaje de Aprobacion: </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar bg-success" style="width: <?php echo $int_cast4; ?>%;"><?php echo $int_cast4; ?>%</div>
                            </div>
                        </div>;
                    <?php
                    } else {
                    ?>
                        <div class="col">
                            <label for="asig_r4" class="form-label">Sin Asignaturas Inscritas </label>
                            <div class="progress bg-light" style="height: 35px;">
                                <div id="barra-progreso" class="progress-bar"> </div>
                            </div>
                        </div>;
                    <?php
                    }
                    ?>
                    <hr>
                    <table class="table_id">
                        <tr>
                            <th scope="col">Docentes 1er Semestre 2024</th>
                            <th scope="col">Docentes 2do Semestre 2024</th>
                        </tr>

                        <?php

                        if ($resultado->num_rows >= 1) {
                            while ($usuario = mysqli_fetch_array($resultado)) {

                        ?>
                                <tr>
                                    <td><?php echo $usuario['doc_sem1']; ?></td>
                                    <td><?php echo $usuario['doc_sem2']; ?></td>
                                </tr>

                            <?php
                            }
                        } else {

                            ?>
                            <tr class="text-center">
                                <td colspan="16">No existen registros del estudiante</td>
                            </tr>

                        <?php

                        }

                        ?>

                    </table>
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <br>
                <br>
                <div class="col text-center">
                    <a href="lector.php" class="btn btn-primary">Volver
                        <i class="fa-solid fa-circle-left"></i></a>
                </div>
            </div>
        </div>
        <hr>
    </form>
    <script src="../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>