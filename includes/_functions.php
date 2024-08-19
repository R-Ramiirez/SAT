<?php

require_once("conexion.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'editar_registro':
            editar_registro();
            break;

        case 'eliminar_registro';
            eliminar_registro();
            break;

        case 'acceso_user';
            acceso_user();
            break;

        case 'editar_estudiante':
            editar_estudiante();
            break;

        case 'eliminar_estudiante';
            eliminar_estudiante();
            break;

        case 'editar_actividad':
            editar_actividad();
            break;

        case 'editar_asistencia';
            editar_asistencia();
            break;

        case 'eliminar_actividad';
            eliminar_actividad();
            break;
    }
}

function editar_registro()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

    mysqli_query($conex, $consulta);

    header('Location: ../views/user.php');
}

function eliminar_registro()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id= $id";

    mysqli_query($conex, $consulta);

    header('Location: ../views/user.php');
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conex = mysqli_connect("localhost", "root", "", "registro");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado = mysqli_query($conex, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['rol'] == 1) { //admin

        header('Location: inicio.php');
    } else if ($filas['rol'] == 2) { //lector
        header('Location: ../views/lector.php');
    } else {
        header('Location: login.php');
        session_destroy();
    }
}

function editar_estudiante()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];

    // Saneamiento de datos
    $nombre = mysqli_real_escape_string($conex, $nombre);
    $carrera = mysqli_real_escape_string($conex, $carrera);
    $situacion_academica = mysqli_real_escape_string($conex, $situacion_academica);
    $ingreso = mysqli_real_escape_string($conex, $ingreso);

    // Consulta preparada
    $consulta = "UPDATE estudiantes INNER JOIN carreras ON estudiantes.carrera = carreras.carrera
SET nombre = ?, estudiantes.carrera = ?, situacion_academica = ?, ingreso = ? WHERE id = ?";

    $stmt = mysqli_prepare($conex, $consulta);
    mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $carrera, $situacion_academica, $ingreso, $id);
    mysqli_stmt_execute($stmt);

    header('Location: inicio.php');
}

function eliminar_estudiante()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM estudiantes WHERE id= $id";

    mysqli_query($conex, $consulta);

    header('Location: inicio.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cb1']) && $_POST['cb1'] == '1') {
        echo "Casilla 1 chequeada.<br>";
    }
    if (isset($_POST['cb2']) && $_POST['cb2'] == '1') {
        echo "Casilla 2 chequeada.<br>";
    }
}

function editar_actividad()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];

    // Saneamiento de datos
    $actividad = mysqli_real_escape_string($conex, $actividad);
    $descripcion = mysqli_real_escape_string($conex, $descripcion);
    $fecha = mysqli_real_escape_string($conex, $fecha);

    // Consulta preparada
    $consulta = "UPDATE actividades
    SET actividad = ?, descripcion = ?, fecha = ? WHERE id_actividades = ?";

    $stmt = mysqli_prepare($conex, $consulta);
    mysqli_stmt_bind_param($stmt, "sssi", $actividad, $descripcion, $fecha, $id);
    mysqli_stmt_execute($stmt);

    header('Location: actividades.php');
}

function editar_asistencia()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];

    // Iterar sobre los valores de asistencia enviados
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'asistencia_')!== false) {
            $rut = str_replace('asistencia_', '', $key);
            $asistencia = mysqli_real_escape_string($conex, $value);

            // Consulta preparada
            $consulta = "UPDATE asistencia SET asistencia =? WHERE rut =? AND id_actividad =?";
            $stmt = mysqli_prepare($conex, $consulta);
            mysqli_stmt_bind_param($stmt, "isi", $asistencia, $rut, $id);
            mysqli_stmt_execute($stmt);
        }
    }
    header('Location: asistencia.php');
}

function eliminar_actividad()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];

    // Consulta preparada para eliminar la actividad
    $consulta = "DELETE FROM actividades WHERE id_actividades =?";

    $stmt = mysqli_prepare($conex, $consulta);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Consulta preparada para eliminar los detalles de la actividad
    $consulta_detalle = "DELETE FROM asistencia WHERE id_actividad =?";

    $stmt_detalle = mysqli_prepare($conex, $consulta_detalle);
    mysqli_stmt_bind_param($stmt_detalle, "i", $id);
    mysqli_stmt_execute($stmt_detalle);

    header('Location: actividades.php');
}
