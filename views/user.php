<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>

  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilo.css">
  <title>Usuarios</title>
</head>

<div class="container is-fluid">
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

  <div class="col-xs-12">
    <br>
    <h1>Usuarios Disponibles</h1>
    <br>

    </form>

    <table class="table table-striped table-dark " id="table_id">


      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Password</th>
          <th>Telefono</th>
          <th>Fecha</th>
          <th>Rol</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>

        <?php

        include("../includes/conexion.php");

        $conex = mysqli_connect("$servername", "$username", "$password", "$database");
        $SQL = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
user.fecha, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id";
        $dato = mysqli_query($conex, $SQL);

        if ($dato->num_rows > 0) {
          while ($fila = mysqli_fetch_array($dato)) {

        ?>
            <tr>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['correo']; ?></td>
              <td><?php echo $fila['password']; ?></td>
              <td><?php echo $fila['telefono']; ?></td>
              <td><?php echo $fila['fecha']; ?></td>
              <td><?php echo $fila['rol']; ?></td>

              <td>

                <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-edit"></i> </a>

                <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                  <i class="fa fa-trash"></i></a>

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

        </body>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>