<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario  con HTML5 YCSS3</title>
    <link rel="stylesheet" href="css/estilos_formulario.css">
</head>
<body>
    <?php
    $nombreErr = "";
    $nombre = "";
    $apellidoErr = "";
    $apellido = "";
    $domicilioErr = "";
    $domicilio = "";
    $usuario = "";
    $contrasena = "";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["nombre"])){  // empty significa vacio, es decir  "Sí está vacio el campo nombre entonces mostrar el mensaje"
            $nombreErr = "El campo nombre es requerido";
        }else {
            $nombre = test_input($_POST["nombre"]);
            if(!preg_match("/^[A-Z][a-záéíóú]{2,}([ ]?[A-Z][a-zA-Záéíóú]{2,})?$/", $nombre)){ //Comparamos la expresion con la variable $nombre
                $nombreErr = "Solo se aceptan 2 nombres, de los cuales deben empezar por una letra mayúscula. y no deben contener números";
            }
        } 

        if(empty($_POST["apellidos"])){  // empty significa vacio, es decir  "Sí está vacio el campo nombre entonces mostrar el mensaje"
            $apellidoErr = "El campo apellidos es requerido";
        }else {
            $apellido = test_input($_POST["apellidos"]);
            if(!preg_match("/^[A-Z][a-záéíóú]+ [A-Z][a-zA-Záéíóú]+$/", $apellido)){ //Comparamos la expresion con la variable $nombre
                $apellidoErr = "Solo se aceptan 2 apellidos, de los cuales deben empezar por una letra mayúscula. y no deben contener números";
            }
        } 

        if(empty($_POST["domicilio"])){  // empty significa vacio, es decir  "Sí está vacio el campo nombre entonces mostrar el mensaje"
            $domicilioErr = "El campo domicilio es requerido";
        }else {
            $domicilio = test_input($_POST["domicilio"]);
            if(!preg_match("/^[a-zA-Z0-9\s\.,#\-]+(?: [a-zA-Z0-9\s\.,#\-]+)*$/", $domicilio)){ //Comparamos la expresion con la variable $nombre
                $domicilioErr = "Solo se aceptan letras y espacios";
            }
        } 

        if(empty($_POST["usuario"])){  // empty significa vacio, es decir  "Sí está vacio el campo nombre entonces mostrar el mensaje"
            $usuarioErr = "El campo usuario es requerido";
        }else {
            $usuario = test_input($_POST["usuario"]);
            if(!preg_match("/^[A-Z][a-záéíóú]{2,}([ ]?[A-Z][a-zA-Záéíóú]{2,})?$/", $usuario)){ //Comparamos la expresion con la variable $nombre
                $usuarioErr = "Solo se aceptan letras y espacios";
            }
        } 

        if(empty($_POST["contrasena"])){  // empty significa vacio, es decir  "Sí está vacio el campo nombre entonces mostrar el mensaje"
            $contrasenaErr = "El campo contrasena es requerido";
        }else {
            $contrasena = test_input($_POST["contrasena"]);
            if(!preg_match("/^[a-zA-Z0-9\s\.,#\-]+(?: [a-zA-Z0-9\s\.,#\-]+)*$/", $contrasena)){ //Comparamos la expresion con la variable $nombre
                $contrasenaErr = "se haceptan letras, espacios y simbolos.";
            }
        }

    }   // esta condicional entra una vez se hayan enviado los datos de formulario.

    function test_input($data){   // Esta funcion hace que limpie toda la cadena de carcater que sea introduciad en algún input, que pudiese ser inyección SQL, para que sea una cadena sencilla de texto, es decir omitir
        $data = trim($data); // le quita los espacios a toda la cadena de entrada
        $data = stripcslashes($data); // quita todos los diagonales a la cadena de entrada
        $data = htmlentities($data); //Limpia cualquier caracter que sea html a caracter aceptable.
        return $data;
    }


    ?>

    <div class="contenedor">
        <label for="titulo" class="titulo">Registro de Usuarios</label> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="formulario"  name="formulario" method="POST" > <!--Aqui es una funcion para redireccionar los datos enviados para poder redireccionarlo en la misma página.-->
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" class="form-control" value="<?php echo $nombre; ?>">
            <p class="error" id="nombreError" style="color:red;"> <?php echo $nombreErr; ?></p>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Escribe tus apellidos" class="form-control" value="<?php echo $apellido; ?>">
            <p class="error" id="apellidoError" style="color:red;"><?php echo $apellidoErr; ?></p>

            <label for="genero">Seleccione su género:</label>
            <div class="radio">
                <input type="radio" name="genero" id="H" value="M">
                <label for="H" id="mas">Masculino</label>
                <input type="radio" name="genero" id="M" value="F">
                <label for="M" id="fem">Femenino</label>
            </div>
            <span class="error-message" id="generoError">Selecciona un género.</span>

            <label for="#domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="domicilio" placeholder="Describe la dirección de tu domicilio" class="form-control" value="<?php echo $domicilio; ?>">
            <p class="error" id="domicilioError" style="color:red;"> <?php echo $domicilioErr; ?></p>

            <label for="#usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Describe el nombre para tu usario" class="form-control" value="<?php echo $usuario; ?>">
            <p class="error" id="usuarioError" style="color:red;"> <?php echo $usuarioErr; ?></p>

            <label for="#contrasena">Contraseña</label>
            <input type="text" name="contrasena" id="contrasena" placeholder="Describe una contraseña" class="form-control" value="<?php echo $contrasena; ?>">
            <p class="error" id="contrasenaError" style="color:red;"> <?php echo $contrasenaErr; ?></p>

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-control">
                <label for="checkbox">Acepto terminos y condiciones</label>
                <span class="error-message" id="terminosError">Acepta los términos y condiciones.</span>
            </div>

            <div class="btn-group">
                <input type="reset" value="Cancelar" class="cancelar">
                <input type="submit" value="Registrar" class="guardar">
                
            </div>
        </form>
    </div>
    <?php
     include("alta_usuario.php");
    ?>

    <script src="js/instrucciones.js"></script>
</body>
</html>