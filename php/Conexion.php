<?php

try {
    $usuario = "g4d8p5g9_root";
    $contraseña = "avi_2";
    $conexion = new PDO('mysql:host=50.116.84.114;dbname=g4d8p5g9_AVI2;charset=UTF8', $usuario, $contraseña,$op=null);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>