<?php

 include_once 'Conexion.php';

 $Nombre = $_POST['nombre'];
 $ApellidoPaterno = $_POST['ApellidoPaterno'];
 $ApellidoMaterno = $_POST['ApellidoMaterno'];
 $Edad = $_POST['Edad'];


 $ejecutar = $conexion->prepare("CALL sp_insertar_datos(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:Edad)");
 $ejecutar->BindParam(':Nombre',$Nombre);
 $ejecutar->BindParam(':ApellidoPaterno',$ApellidoPaterno);
 $ejecutar->BindParam(':ApellidoMaterno',$ApellidoMaterno);
 $ejecutar->BindParam(':Edad',$Edad);



 echo $ejecutar->execute();


?>