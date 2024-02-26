<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Respuestas Formulario</title>
    <!--Diseño del documento en PDF y sin boton generador-->
    <style>
        *{
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
        }

        body{
            background: #f2f2f2;
            font-family: sans-serif;
            font-size: 18px;
        }

        table {
            border: 1px;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            margin: 2px;
        }
    
    </style>
</head>
<body>
    <?php
        include("../includes/conexion.php");
    ?>
    <div class="container">
        <div class="row justify-content-center pt-5"">
            <div class="col-md-7">
                <h1 class="display-4">Respuestas Formulario</h1>
                <hr class="bg-info">
                <p class="pb-0 mb-0">Datos capturados de la BDD.</p>  
                <p class="text-danger small pt-0 mt-0">*Datos protegidos contra divulgación</p>
                <br>
                <div class="table">
			        <table>
                        <tr>
                            <th scope="col" style="width: 18%;">RUT </th>
                            <th scope="col" style="width: 20%;">NOMBRE </th>
                            <th scope="col" style="width: 20%;">CARRERA </th>
                            <th scope="col">Cohorte </th>
                            <th scope="col">Situacion Academica </th>
                        </tr>
					    <?php
						    $consultas = "SELECT * FROM estudiantes";
						    $ejecutarConsulta = mysqli_query($conex, $consultas);
						    $verFilas = mysqli_num_rows($ejecutarConsulta);
						    $fila = mysqli_fetch_array($ejecutarConsulta);
						    if(!$ejecutarConsulta){
							    echo"Error en la consulta";
						    }else{
							    if($verFilas<1){
								    echo"<tr><td>Sin registros</td><td></td><td></td><td></td><td></td></tr>";
							    }else{
								    for($i=0; $i<=$fila; $i++){
									    echo'
										    <tr>
											    <td>'.$fila[1].'</td>
											    <td>'.$fila[2].'</td>
											    <td>'.$fila[3].'</td>
                                                <td>'.$fila[4].'</td>
                                                <td>'.$fila[5].'</td>
										    </tr>
									    ';
									    $fila = mysqli_fetch_array($ejecutarConsulta);
								    }
							    }
						    }
					    ?>
			        </table>
		        </div>
            </div>
        </div>
    </div>      
</body>
</html>