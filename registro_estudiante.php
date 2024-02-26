<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ./includes/login.php");
    die();

}

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    
    <title>Registros</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="./estilos/estilo6.css">
</head>

<body id="page-top">

<form  action="./includes/validar.php" method="POST">
    <div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Registro de nuevo estudiante</h3>
                            <div class="form-group">
                            <label for="rut" class="form-label">Rut: *</label>
                            <input type="text"  id="rut" name="rut" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre Completo: *</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                  <label for="carrera" class="form-label">Carrera: *</label>
                                <input type="text"  id="carrera" name="carrera" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="cohorte">Cohorte: *</label><br>
                                <input type="number" name="cohorte" id="cohorte" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="situacion_academica" class="form-label">Situacion Academica *</label>
                                <input type="text"  id="situacion_academica" name="situacion_academica" class="form-control" placeholder="" required>
                             
                            </div>
                            <div class="form-group">
                                <label for="ingreso">Modo de Ingreso: *</label><br>
                                <input type="text" name="ingreso" id="ingreso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cod_carrera">Codigo de Carrera: *</label><br>
                                <input type="number" name="cod_carrera" id="cod_carrera" class="form-control" required>
                            </div>
                      
                        
                           <br>

                           <div class="btn-group mx-auto d-block text-center" role="group" aria-label="Basic mixed styles example">
                            <button type="reset" name="limpiar" value="Limpiar" class="btn">Limpiar</button>
                            <input type="submit" value="Guardar"class="btn btn-success" 
                               name="reg_estudiante">
                               <a href="./includes/inicio.php" class="btn btn-danger">Cancelar</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>