<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();
}

// Captura el id seleccionado. 
$id = $_GET['id'];
$conex = mysqli_connect("localhost", "root", "", "registro");
$consulta = "SELECT * FROM estudiantes INNER JOIN retencion INNER JOIN vulnerabilidad INNER JOIN docentes INNER JOIN asignaturas ON estudiantes.cod_carrera = retencion.cod_carrera and estudiantes.liceo = vulnerabilidad.liceos and estudiantes.cod_carrera = docentes.cod_carrera and estudiantes.rut = asignaturas.rut WHERE id = $id";
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
    <title>Ver Datos estudiante</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo9.css">
</head>

<body id="page-top">
    <?php
    include("conexion.php");
    ?>
    <form>
        <div id="login">
            <div class="container">
                <br>
                <br>
                <h3 class="text-center">Ver estudiante</h3>
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
                        <label for="porcentaje" class="form-label">Porcentaje de Retencion de la Carrera: </label>
                        <label class="form-control"><?php echo $usuario['porcentaje']; ?></label>
                    </div>
                    <div class="col">
                        <label for="situacion_academica" class="form-label">Situacion Academica: </label><br>
                        <label class="form-control"><?php echo $usuario['situacion_academica']; ?></label>
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
                    <div class="col">
                        <label for="vulnerabilidad" class="form-label">Porcentaje de Vulnerabilidad: </label>
                        <label class="form-control"><?php echo $usuario['vulnerabilidad']; ?></label>
                    </div>
                    <hr>
                    <h4>Asignaturas Totales:</h4>
                    <div class="col">
                        <label for="asig_t1" class="form-label">1er Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_t1']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_t2" class="form-label">2do Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_t2']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_t3" class="form-label">3er Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_t3']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_t4" class="form-label">4to Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_t4']; ?></label>
                    </div>
                    <p>
                    <h4>Asignaturas Reprobadas:</h4>
                    <div class="col">
                        <label for="asig_r1" class="form-label">1er Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_r1']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r2" class="form-label">2do Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_r2']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r3" class="form-label">3er Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_r3']; ?></label>
                    </div>
                    <div class="col">
                        <label for="asig_r4" class="form-label">4to Semestre: </label>
                        <label class="form-control"><?php echo $usuario['asig_r4']; ?></label>
                    </div>
                    <hr>
                    <!-- Testeo barra -->

                    <?php
                    $porcen1 = ($usuario['asig_r1'] * 100) / $usuario['asig_t1'];
                    ?>

                    <div class="progress">
                        <div class="" id="bar1" role="progressbar" onclick="enviar(event)" style="width: 15%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="20"></div>
                    </div>
                    <form id="form" data-parsley-validate novalidate>
                        <div class="form-group row">
                            <label for="inputText22" class="col-3 col-lg-3 col-form-label text-left label-style">Valor Obtenido:</label>
                            <div class="col-9 col-lg-9">
                                <input id="inputText22" type="number" class="form-control" placeholder="Numbers" onkeyup="setProgress()" onchange="setProgress(event)">
                            </div>
                        </div>
                        <button type="submit" onclick="enviar(event)">
                            Enviar
                        </button>
                    </form>

                    <div class="col">
                        <label for="progress" class="form-label">Barra progreso: </label>
                        <label class="progress progress-bar" style="<?php echo $porcen1; ?>">%</label>
                    </div>

                    <!-- Fin del test -->
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
                                <td colspan="16">No existen registros</td>
                            </tr>

                        <?php

                        }

                        ?>

                    </table>
                </div>

                <br>
                <div class="col text-center">
                    <a class="btn btn-warning" href="../views/editar_estudiante.php?id=<?php echo $usuario['id'] ?>">Editar
                        <i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href="../views/eliminar_estudiante.php?id=<?php echo $usuario['id'] ?>">Eliminar
                        <i class="fa fa-trash"></i></a>
                    <a href="inicio.php" class="btn btn-primary">Volver
                        <i class="fa-solid fa-circle-left"></i></a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>