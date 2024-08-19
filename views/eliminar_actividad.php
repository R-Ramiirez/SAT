<?php

include("../includes/conexion.php");

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <title>Eliminar Actividad</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion?</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="../includes/_functions.php" method="POST">
                            <input type="hidden" name="accion" value="eliminar_actividad">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="" value="Eliminar" class=" btn btn-danger">
                            <a href="../includes/actividades.php?id=<?php echo $id ?>" class="btn btn-success">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>