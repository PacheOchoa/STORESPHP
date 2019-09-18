<?php


  include_once 'Conexion.php';

  $id_U = $_POST['idpersona'];
  $NombreU = $_POST['nombreU'];
 



  $ejec = $conexion->prepare("UPDATE asesores
                             SET nombre_asesores=:Nombre
                             WHERE id=:id");

  $ejec->BindParam(":Nombre",$NombreU);
  $ejec->BindParam(":id",$id_U,PDO::PARAM_INT);


  echo $ejec->execute();
  


?>
