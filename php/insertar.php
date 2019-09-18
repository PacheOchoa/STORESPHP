<?php

 include_once 'Conexion.php';

 $Nombre = $_POST['nombre'];


 

 $ejecutar = $conexion->prepare("INSERT INTO asesores(nombre_asesores) VALUES(:Nombre)");

 $ejecutar->BindParam(':Nombre',$Nombre);
 



 echo $ejecutar->execute();


?>