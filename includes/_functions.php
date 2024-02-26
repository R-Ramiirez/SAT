<?php
   
require_once ("conexion.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
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

		}
	}

    function editar_registro() {
		$conex = mysqli_connect("localhost", "root", "", "registro");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conex, $consulta);

		header('Location: ../views/user.php');

    }

    function eliminar_registro() {
        $conex = mysqli_connect("localhost", "root", "", "registro");
        extract($_POST);
        $id= $_POST['id'];
        $consulta= "DELETE FROM user WHERE id= $id";

        mysqli_query($conex, $consulta);

        header('Location: ../views/user.php');

    }

    function acceso_user() {
        $nombre=$_POST['nombre'];
        $password=$_POST['password'];
        session_start();
        $_SESSION['nombre']=$nombre;

        $conex = mysqli_connect("localhost", "root", "", "registro");
        $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
        $resultado=mysqli_query($conex, $consulta);
        $filas=mysqli_fetch_array($resultado);

        if($filas['rol'] == 1){ //admin

            header('Location: inicio.php');

        }else if($filas['rol'] == 2){//lector
            header('Location: ../views/lector.php');
        }
        
        else{
            header('Location: login.php');
            session_destroy();

        }

    }

    function editar_estudiante() {
        $conex = mysqli_connect("localhost", "root", "", "registro");
        extract($_POST);
        $consulta="UPDATE estudiantes SET nombre = '$nombre', carrera = '$carrera', cohorte = '$cohorte',
        situacion_academica ='$situacion_academica', ingreso = '$ingreso', cod_carrera = '$cod_carrera' WHERE id = '$id' ";

        mysqli_query($conex, $consulta);

        header('Location: inicio.php');

    }

    function eliminar_estudiante() {
        $conex = mysqli_connect("localhost", "root", "", "registro");
        extract($_POST);
        $id= $_POST['id'];
        $consulta= "DELETE FROM estudiantes WHERE id= $id";

        mysqli_query($conex, $consulta);

        header('Location: inicio.php');

    }
    