<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){
    header("Location: ../includes/login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Eliminar Estudiante</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3">
    <div class="alert alert-danger text-center">
    <p>¿Desea confirmar la eliminacion del estudiante?</p>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="../includes/_functions.php" method="POST">
                <input type="hidden" name="accion" value="eliminar_estudiante">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="submit" name="" value="Eliminar" class= " btn btn-danger">
                <a href="../includes/inicio.php" class="btn btn-success">Cancelar</a>
            </form>
        </div>
    </div>



</body>
</html>