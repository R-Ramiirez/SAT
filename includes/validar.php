<?php
  $conex = mysqli_connect("localhost", "root", "", "registro");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO user (nombre, correo, telefono, password, rol)
    VALUES ('$nombre', '$correo','$telefono','$password', '$rol' )";

    mysqli_query($conex, $consulta);
    mysqli_close($conex);

    header('Location: ../views/user.php');
  }
}

if(isset($_POST['reg_estudiante'])){

  if(strlen($_POST['rut']) >=1 && strlen($_POST['nombre'])  >=1 && strlen($_POST['carrera'])  >=1 
  && strlen($_POST['cohorte'])  >=1 && strlen($_POST['situacion_academica']) >= 1 && strlen($_POST['ingreso']) >= 1
  && strlen($_POST['cod_carrera']) >= 1 ){

  $rut = trim($_POST['rut']);
  $nombre = trim($_POST['nombre']);
  $carrera = trim($_POST['carrera']);
  $cohorte = trim($_POST['cohorte']);
  $situacion_academica = trim($_POST['situacion_academica']);
  $ingreso = trim($_POST['ingreso']);
  $cod_carrera = trim($_POST['cod_carrera']);

  $consulta= "INSERT INTO estudiantes (rut, nombre, carrera, cohorte, situacion_academica, ingreso, cod_carrera)
  VALUES ('$rut', '$nombre', '$carrera','$cohorte','$situacion_academica', '$ingreso', '$cod_carrera' )";

  mysqli_query($conex, $consulta);
  mysqli_close($conex);

  header('Location: inicio.php');
}
}

?>