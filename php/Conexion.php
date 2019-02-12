<?php

try {
    $usuario = "root";
    $contraseña = "";

    $conexion = new PDO('mysql:host=localhost;dbname=_personas', $usuario, $contraseña);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>