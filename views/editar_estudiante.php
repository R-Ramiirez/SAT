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
$consulta = "SELECT estudiantes.*, docentes.*, retencion.*, carreras.*, vulnerabilidad.*, asignatura.*
FROM estudiantes
INNER JOIN carreras ON estudiantes.carrera = carreras.carrera
INNER JOIN retencion ON carreras.cod_carrera = retencion.cod_carrera
INNER JOIN docentes ON carreras.cod_carrera = docentes.cod_carrera
INNER JOIN vulnerabilidad ON estudiantes.liceo = vulnerabilidad.liceos
INNER JOIN asignatura ON estudiantes.rut = asignatura.rut
WHERE estudiantes.id = $id;";
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
    <title>Editar estudiante</title>

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
                            <h3 class="text-center">Editar estudiante</h3>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="rut" class="form-label">Rut: </label>
                                <label class="form-control"><?php echo $usuario['rut']; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre: *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="carrera">Carrera: *</label><br>
                                <select class="form-select" id="carrera" name="carrera" required>
                                    <option selected><?php echo $usuario['carrera']; ?></option>
                                    <option>ARQUITECTURA</option>
                                    <option>AUDITORÍA</option>
                                    <option>BIOLOGÍA MARINA</option>
                                    <option>DERECHO</option>
                                    <option>ENFERMERÍA</option>
                                    <option>INGENIERÍA CIVIL</option>
                                    <option>INGENIERÍA COMERCIAL</option>
                                    <option>INGENIERÍA EN COMPUTACIÓN</option>
                                    <option>INGENIERÍA EN CONSTRUCCIÓN</option>
                                    <option>INGENIERÍA MECÁNICA</option>
                                    <option>INGENIERÍA PLAN COMÚN</option>
                                    <option>KINESIOLOGÍA</option>
                                    <option>MEDICINA</option>
                                    <option>NUTRICIÓN Y DIETÉTICA</option>
                                    <option>PEDAGOGÍA EDUCACIÓN BÁSICA</option>
                                    <option>PEDAGOGÍA EDUCACIÓN FÍSICA</option>
                                    <option>PEDAGOGÍA EN CASTELLANO</option>
                                    <option>PEDAGOGÍA EN EDUCACIÓN PARVULARIA</option>
                                    <option>PEDAGOGÍA EN HISTORIA</option>
                                    <option>PEDAGOGÍA EN INGLÉS</option>
                                    <option>PSICOLOGÍA</option>
                                    <option>TÉCNICO DE NIVEL SUPERIOR EN ADMINISTRACION (NATALES)</option>
                                    <option>TÉCNICO DE NIVEL SUPERIOR EN ANALISIS DE SISTEMAS COMPUTACIONALES</option>
                                    <option>TÉCNICO DE NIVEL SUPERIOR EN CONSTRUCCIÓN</option>
                                    <option>TÉCNICO DE NIVEL SUPERIOR EN ENFERMERIA (NATALES)</option>
                                    <option>TÉCNICO EN ACUICULTURA</option>
                                    <option>TÉCNICO EN PROCESOS INDUSTRIALES </option>
                                    <option>TÉCNICO EN TURISMO</option>
                                    <option>TÉCNICO EN TURISMO (PUERTO NATALES)</option>
                                    <option>TRABAJO SOCIAL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cohorte" class="form-label">Año de Cohorte:</label>
                                <label class="form-control"><?php echo $usuario['cohorte']; ?></label>

                            </div>
                            <div class="form-group">
                                <label for="situacion_academica">Situacion Academica: *</label><br>
                                <input type="text" name="situacion_academica" id="situacion_academica" class="form-control" value="<?php echo $usuario['situacion_academica']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ingreso" class="form-label">Modo de Ingreso: *</label>
                                <input type="text" id="ingreso" name="ingreso" class="form-control" value="<?php echo $usuario['ingreso']; ?>" required>

                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="hidden" name="accion" value="editar_estudiante">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a class="btn btn-danger" href="../includes/estudiantePerfil.php?id=<?php echo $id; ?>">Cancelar</a>

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