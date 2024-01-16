<?php
    include("conexion.php");

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $genero = $_POST['genero'];
    $domicilio = $_POST['domicilio'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT,array("cost"=>12));

    
    $sql = "INSERT INTO `Users` (`id_usuario`, `nombre`, `apellidos`, `genero`, `domicilio`, `usuario`, `contrasena`) VALUES (NULL, :nombre, :apellidos, :genero, :domicilio, :usuario, :contrasena);";
    $result = $conex->prepare($sql);
    $result->execute(array(":nombre"=>$nombre, ":apellidos"=>$apellidos, ":genero"=>$genero, ":domicilio"=>$domicilio, ":usuario"=>$usuario, ":contrasena"=>$contrasena_cifrado));

    echo($sql);

?>