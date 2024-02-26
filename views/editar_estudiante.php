<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    
}

$id= $_GET['id'];
$conex = mysqli_connect("localhost", "root", "", "registro");
$consulta= "SELECT * FROM estudiantes WHERE id = $id";
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

<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Editar estudiante</h3>
                            <div class="form-group">
                                <label for="rut" class="form-label">Rut: </label>
                                <label class="form-control"><?php echo $usuario['rut']; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre: *</label>
                                <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="carrera">Carrera: *</label><br>
                                <input type="text" name="carrera" id="carrera" class="form-control" placeholder="" value="<?php echo $usuario['carrera'];?>"required>
                            </div>
                            <div class="form-group">
                                  <label for="cohorte" class="form-label">Año de Cohorte: *</label>
                                <input type="number"  id="cohorte" name="cohorte" class="form-control" value="<?php echo $usuario['cohorte'];?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="situacion_academica">Situacion Academica: *</label><br>
                                <input type="text" name="situacion_academica" id="situacion_academica" class="form-control" value="<?php echo $usuario['situacion_academica'];?>" required>
                            </div>
                            <div class="form-group">
                                  <label for="ingreso" class="form-label">Modo de Ingreso: *</label>
                                <input type="text"  id="ingreso" name="ingreso" class="form-control" value="<?php echo $usuario['ingreso'];?>" required>
                                
                            </div>
                            <div class="form-group">
                            <label for="cod_carrera" class="form-label">Codigo de la Carrera: *</label>
                                <input type="number"  id="cod_carrera" name="cod_carrera" class="form-control" value="<?php echo $usuario['cod_carrera'];?>" required>
                                
                                <input type="hidden" name="accion" value="editar_estudiante">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>

                            <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a class="btn btn-danger" href="../includes/inicio.php?id=<?php echo $usuario['id']?>">Cancelar</a>
                                
                               
                            </div>
                            </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>