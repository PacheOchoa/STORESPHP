<?php


  include_once 'Conexion.php';

  $id_U = $_POST['idpersona'];
  $NombreU = $_POST['nombreU'];
  $ApellidoPaternoU = $_POST['ApellidoPaternoU'];
  $ApellidoMaternoU = $_POST['ApellidoPaternoU'];
  $EdadU = $_POST['EdadU'];



  $sql = "CALL sp_actualizar_datos(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:Edad,:id)";

  $ejec = $conexion->prepare($sql);

  $ejec->BindParam(":Nombre",$NombreU);
  $ejec->BindParam(":ApellidoPaterno",$ApellidoPaternoU);
  $ejec->BindParam(":ApellidoMaterno",$ApellidoMaternoU);
  $ejec->BindParam(":Edad",$EdadU);
  $ejec->BindParam(":id",$id_U);


  echo $ejec->execute();
  


?>