<?php


  include_once 'Conexion.php';

  $id_U = $_POST['idpersona'];
  $NombreU = $_POST['nombreU'];
  $ApellidoPaternoU = $_POST['ApellidoPaternoU'];
  $ApellidoMaternoU = $_POST['ApellidoMaternoU'];
  $EdadU = $_POST['EdadU'];



  $ejec = $conexion->prepare( "CALL sp_actualizar_datos(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:Edad,:id)");

  $ejec->BindParam(":Nombre",$NombreU);
  $ejec->BindParam(":ApellidoPaterno",$ApellidoPaternoU);
  $ejec->BindParam(":ApellidoMaterno",$ApellidoMaternoU);
  $ejec->BindParam(":Edad",$EdadU,PDO::PARAM_INT);
  $ejec->BindParam(":id",$id_U,PDO::PARAM_INT);


  echo $ejec->execute();
  


?>
