<?php


  include_once 'Conexion.php';

  $id_U = $_POST['idpersona'];
  $NombreU = $_POST['nombreU'];
  $ApellidoPaternoU = $_POST['ApellidoPaternoU'];
  $ApellidoMaternoU = $_POST['ApellidoPaternoU'];
  $EdadU = $_POST['EdadU'];



  $sql = "CALL sp_actualizar_datos(:NombreU,:ApellidoPaternoU,:ApellidoMaternoU,:EdadU,:idU)";

  $ejec = $conexion->prepare($sql);

  $ejec->BindParam(":NombreU",$NombreU);
  $ejec->BindParam(":ApellidoPaternoU",$ApellidoPaternoU);
  $ejec->BindParam(":ApellidoMaternoU",$ApellidoMaternoU);
  $ejec->BindParam(":Edad",$EdadU);
  $ejec->BindParam(":id",$id_U);


  echo $ejec->execute();
  


?>
