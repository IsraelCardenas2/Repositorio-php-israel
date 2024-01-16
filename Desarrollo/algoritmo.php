<?php include("seguridad.php"); ?>

<?php
$time = 0.05;
$costo = 18;
$nombre = "Israel";
$hash = '$2y$12$Jnq0UjL2YsOV9kSX4V8B2ecCvMq7910eFgTHBsUgeJgoyyUwhokSm';


if (password_verify('Israel',$hash)){
   echo "Válido...";
   echo $hash;
}else {
   echo "error";
}
//do {
//   $costo ++;
//   $inicio = microtime(true);
//    password_hash("test", PASSWORD_BCRYPT,["cost"=>$costo]);
//   $fin = microtime(true);
//   }

//while(($fin-$inicio)< $time);
//     echo "Costo apropiado encontrado: " .$costo."\n";

?>