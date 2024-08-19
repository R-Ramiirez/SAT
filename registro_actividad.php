<?php
include("./includes/conexion.php");
?>

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
                            <h3 class="text-center">Registro de nueva actividad</h3><br>
                            <div class="form-group">
                                <label for="actividad" class="form-label">Actividad: *</label><br>
                                <input type="text" id="actividad" name="actividad" class="form-control" required><br>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion de la actividad: *</label><br>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" required><br>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de realizacion de la actividad: *</label><br>
                                <input type="date" name="fecha" id="fecha" class="form-control" required><br>
                            </div>
                            <br>
                            <?php
                            if (isset($_GET['enviar'])) {
                                $busqueda = $_GET['busqueda'];
                                if (isset($_GET['busqueda'])) {
                                    $where = "WHERE estudiantes.RUT LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
                                OR carrera  LIKE'%" . $busqueda . "%' OR cohorte  LIKE'%" . $busqueda . "%'";
                                }
                            }
                            ?>
                            <div class="mb-3">
                                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscador de estudiantes">
                            </div>
                            <table id="tablaAsistencia" class="table_id">
                                <thead>
                                    <tr>
                                        <th class="col text-center" data-sort="rut">RUT</th>
                                        <th class="col-md-3" data-sort="nombre">NOMBRE DE LOS PARTICIPANTES</th>
                                        <th class="col-md-3" data-sort="carrera">CARRERA</th>
                                        <th class="col text-center" data-sort="asistencia">ASISTENCIA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                                    $SQL = "SELECT * FROM estudiantes";
                                    $dato = mysqli_query($conex, $SQL);

                                    if ($dato && mysqli_num_rows($dato) > 0) {
                                        $i = 0;
                                        while ($usuario = mysqli_fetch_assoc($dato)) {
                                    ?>
                                            <tr data-id="<?php echo $usuario['rut']; ?>">
                                                <td class="text-center"><?php echo $usuario['rut']; ?></td>
                                                <td><?php echo $usuario['nombre']; ?></td>
                                                <td><?php echo $usuario['carrera']; ?></td>
                                                <td class="text-center">
                                                    <select name="asistencia[<?php echo $i; ?>]" id="asistencia">
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                    <input type="hidden" name="rut[<?php echo $i; ?>]" value="<?php echo $usuario['rut']; ?>">
                                                </td>
                                            </tr>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                            </table>
                            <br>
                            <div class="btn-group mx-auto d-block text-center" role="group" aria-label="Basic mixed styles example">
                                <button type="reset" name="limpiar" value="Limpiar" class="btn">Limpiar</button>
                                <input type="submit" value="Guardar" class="btn btn-success" name="reg_actividad">
                                <a href="./includes/actividades.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./js/buscador.js"></script>
    <script src="./js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>