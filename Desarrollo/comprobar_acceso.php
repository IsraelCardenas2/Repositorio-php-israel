<?php
if(isset($_POST["guardar"])){
    require("conexion.php");
    $user = htmlentities(addslashes($_POST["usuario"]));
    $pwd = htmlentities(addslashes($_POST["pwd"]));
    $contador = 0;

    if (!empty($user) && !empty($pwd)){
        $sql = "SELECT * FROM Users WHERE usuario = :usuario";
        $result = $conex->prepare($sql);
        $result->bindValue(":usuario", $user);
        $result->execute();
        $numero_registro = $result->rowCount();

        if ($numero_registro > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($user === $row['usuario'] && password_verify($pwd, $row['contrasena'])){
                $contador++;
            }

            if ($contador > 0){
                $contador = 0;

                session_start();
                $_SESSION["usuario"]=$row['usuario'];
                header("location: home.php");
            } else{
                require("login.html");
                echo("<script>alert('El ususario y/o contraseñason incorrectos!');</script>");
            }
            $result->closeCursor();
        }else{
            require("login.html");
            echo("<script>alert('El ususario y/o contraseñason incorrectos!');</script>");
        }
    } else{
        require("login.html");
        echo("<script>alert('Los campos están vacios!'):</script>");
    }
    echo"<meta http-equiv='Refresh' content='2;url=login.html'>";

} else{
    header("location:login.html");
}
?>