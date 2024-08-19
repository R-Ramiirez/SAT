<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Inicio</title>
  <link rel="stylesheet" type="text/css" href="../estilos/estilo17.css">
  <!--J QUERY-->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    //importamos configuraciones de toastr
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
</head>

<body>
  <?php
  include("../includes/conexion.php");
  ?>
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

    <div class="row justify-content-center mt-2 pt-2">
      <h1 class="display-4">Datos de Estudiantes PACE</h1>
      <hr class="bg-info">
      <p class="pb-0 mb-0">Estudiantes con peligro de desercion universitaria.</p>
      <p class="text-danger small pt-0 mt-0">*Datos con proteccion sobre divulgacion.</p>
      <?php
      $conex = mysqli_connect("$servername", "$username", "$password", "$database");
      $where = "";

      if (isset($_GET['enviar'])) {
        $busqueda = $_GET['busqueda'];

        if (isset($_GET['busqueda'])) {
          $where = "WHERE estudiantes.RUT LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
                        OR carrera  LIKE'%" . $busqueda . "%' OR cohorte  LIKE'%" . $busqueda . "%'";
        }
      }
      ?>
      <div class="mb-3">
        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscador Global">
        <hr>
        <a class="btn btn-success disabled" href="../registro_estudiante.php">Nuevo Estudiante
          <i class="fa fa-plus"></i> </a>
        <br>
      </div>
      <table class="table_id">
        <tr>
          <th scope="col" style="width: 10%;">RUT </th>
          <th scope="col" style="width: 20%;">NOMBRE </th>
          <th scope="col" style="width: 20%;">CARRERA </th>
          <th scope="col">COHORTE </th>
          <th scope="col">SITUACION ACADEMICA </th>
          <th scope="col">MODO DE INGRESO </th>
          <th scope="col">CODIGO DE CARRERA </th>
          <th scope="col">ACCIONES</th>
        </tr>
        <?php
        $conex = mysqli_connect("$servername", "$username", "$password", "$database");
        $SQL = "SELECT estudiantes.id, estudiantes.rut, estudiantes.nombre, estudiantes.carrera, estudiantes.cohorte, estudiantes.situacion_academica,
                        estudiantes.ingreso, carreras.cod_carrera 
                        FROM estudiantes 
                        LEFT JOIN carreras ON estudiantes.carrera = carreras.carrera";

        $dato = mysqli_query($conex, $SQL);
        if ($dato->num_rows >= 1) {
          while ($fila = mysqli_fetch_array($dato)) {
        ?>
            <tr>
              <td><?php echo $fila['rut']; ?></td>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['carrera']; ?></td>
              <td><?php echo $fila['cohorte']; ?></td>
              <td><?php echo $fila['situacion_academica']; ?></td>
              <td><?php echo $fila['ingreso']; ?></td>
              <td><?php echo $fila['cod_carrera']; ?></td>
              <td>
                <a class="btn btn-success center" href="perfil.php?id=<?php echo $fila['id'] ?>">
                  <i class="fa-solid fa-eye"></i></a>
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
      <hr>
      <br>
      <div class="col text-center">
        <!--Generamos el documento PDF en otra pagina-->
        <a class="btn btn-success disabled" target="_blank" href="../pdf/pdf.php">Sacar Datos</a>
      </div>
    </div>
  </div>
  <br>
  <hr>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="../js/user.js"></script>
  <script src="../js/acciones.js"></script>
  <script src="../js/buscador.js"></script>
  <script src="../js/nav.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>