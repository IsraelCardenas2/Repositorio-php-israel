<?php
    try {
        $conex = new PDO('mysql:host=localhost; dbname=Septimo', 'root', '');
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex->exec("SET CHARACTER SET utf8");
        //echo("Conexión realizada correctamente...");
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
?>