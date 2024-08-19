<?php
include("conexion.php");
$conex = mysqli_connect("$servername", "$username", "$password", "$database");

if (isset($_POST['registrar'])) {

  if (
    strlen($_POST['nombre']) >= 1 && strlen($_POST['correo'])  >= 1 && strlen($_POST['telefono'])  >= 1
    && strlen($_POST['password'])  >= 1 && strlen($_POST['rol']) >= 1
  ) {

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta = "INSERT INTO user (nombre, correo, telefono, password, rol)
    VALUES ('$nombre', '$correo','$telefono','$password', '$rol' )";

    mysqli_query($conex, $consulta);
    mysqli_close($conex);

    header('Location: ../views/user.php');
  }
}

if (isset($_POST['reg_estudiante'])) {

  if (
    strlen($_POST['rut']) >= 1 && strlen($_POST['nombre'])  >= 1 && strlen($_POST['carrera'])  >= 1
    && strlen($_POST['cohorte'])  >= 1 && strlen($_POST['situacion_academica']) >= 1 && strlen($_POST['ingreso']) >= 1
  ) {

    $rut = trim($_POST['rut']);
    $nombre = trim($_POST['nombre']);
    $carrera = trim($_POST['carrera']);
    $cohorte = trim($_POST['cohorte']);
    $situacion_academica = trim($_POST['situacion_academica']);
    $ingreso = trim($_POST['ingreso']);

    $consulta = "INSERT INTO estudiantes (rut, nombre, carrera, cohorte, situacion_academica, ingreso)
  VALUES ('$rut', '$nombre', '$carrera','$cohorte','$situacion_academica', '$ingreso')";

    mysqli_query($conex, $consulta);
    mysqli_close($conex);

    header('Location: inicio.php');
  }
}

if (isset($_POST['reg_actividad'])) {

  if (
    strlen($_POST['actividad'])  >= 1 && strlen($_POST['descripcion'])  >= 1 && strlen($_POST['fecha']) >= 1
  ) {

    $actividad = trim($_POST['actividad']);
    $descripcion = trim($_POST['descripcion']);
    $fecha = trim($_POST['fecha']);

    // Agregar datos a la tabla actividades
    $consulta = "INSERT INTO actividades (actividad, descripcion, fecha)
  VALUES ('$actividad', '$descripcion', '$fecha')";

    mysqli_query($conex, $consulta);

    // Obtener el ID de la actividad recién insertada
    $id_actividad = mysqli_insert_id($conex);

    // Recorrer el arreglo de asistencias
    foreach ($_POST['asistencia'] as $i => $asistencia_value) {
      $rut = $_POST['rut'][$i];

      // Insertar la asistencia en la base de datos
      $SQL = "INSERT INTO asistencia (rut, id_actividad, asistencia) VALUES ('$rut', '$id_actividad', '$asistencia_value')";
      mysqli_query($conex, $SQL);
    }

    mysqli_close($conex);

    header('Location: actividades.php');
  }
}
