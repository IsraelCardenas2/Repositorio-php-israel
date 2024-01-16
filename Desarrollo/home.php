<?php include("seguridad.php"); ?>
<?php include_once("conexion.php");
    $sal = "SELECT * FROM Users ORDER BY nombre ASC";
    $result = $conex->prepare($sal);
    $result->execute();
    $row = $result->fetchAll();
    $tot_registros = $result->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My page</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <header class="cabecera">
        <div class="cont_head">
            <h3 class="logo">UES San José del Rincón</h3>
            <input type="search" class="buscar" placeholder="¿A quién buscaremos hoy?">
            <div class="g">
                <ul>
                    <li><?php $user = $_SESSION["usuario"]; echo $user[0] ?><i class="fa fa-angle-down"></i></li>
                </ul>
            </div>
        </div>
    </header>
    <body class="cuerpo">
        <div class="menu_lateral">
            <div class="submenu">
                <i class="fa fa-bars" aria-hidden="true" style="margin: 10px 23px; color: rgb(74, 74, 155); font-size: 20px;"></i>
                <ul class="list_ur">
                    <li>hola</li>
                    <li>hola</li>
                    <li>mundo</li>
                    <li>mundo</i>                     
                </ul>
            </div>
            <div class="elementos">
                <ul>
                    <li>
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </li>
                    <li>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </li>
                    <li>
                        <i class="fa fa-group" aria-hidden="true"></i>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tabla"" id="tabla">
            <h2 class="consulta">Consulta General de Usuarios</h2>
            <p class="total">Total: <?php echo $tot_registros ?> registros</p>
            <button class="btn_new">+ Nuevo usuario</button>
            <hr><br>
            <table style="width: 85%; margin: 10px auto; border-radius: 5px; background-color: rgba(209, 209, 209, 0.435); box-shadow: 0.5px 5px 5px 3px rgb(162, 162, 162);" class="table">
                <thead class="thead-inverse">
                    <tr class="text-center">
                        <th style="padding: 4px 15px; text-align: center; border-bottom: 1px solid gray; border-top-left-radius: 5px; background-color: rgba(203, 203, 203, 0.847); " >ID</th>
                        <th style="padding: 4px 15px; text-align: center; border-bottom: 1px solid gray; background-color: rgba(203, 203, 203, 0.847); " >Nombre</th>
                        <th style="padding: 4px 15px; text-align: center; border-bottom: 1px solid gray; background-color: rgba(203, 203, 203, 0.847); " >Apellidos</th>
                        <th style="padding: 4px 15px; text-align: center; border-bottom: 1px solid gray; background-color: rgba(203, 203, 203, 0.847); " >Género</th>
                        <th style="padding: 4px 15px; text-align: center; border-bottom: 1px solid gray; border-top-right-radius: 5px; background-color: rgba(203, 203, 203, 0.847); " >Domicilio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row as $fila):?>
                    <tr>
                        <td style="padding: 4px 15px; text-align: center; background-color: white;"><?php echo $fila["id_usuario"];?></td>
                        <td style="padding: 4px 15px; text-align: center; background-color: white;"><?php echo $fila["nombre"];?></td>
                        <td style="padding: 4px 15px; text-align: center; background-color: white;"><?php echo $fila["apellidos"];?></td>
                        <td style="padding: 4px 15px; text-align: center; background-color: white;"><?php if ($fila['genero'] == "M") {echo("Masculino");}else{echo ("Femenino");}?></td>
                        <td style="padding: 4px 15px; text-align: center; background-color: white;"><?php echo $fila["domicilio"];?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </body>
</body>
</html>