<?php
 include_once 'Conexion.php';

 $id = $_POST['idpersona'];

 $sql = "CALL sp_eliminarPersona(:idpersona)";

 $ejec = $conexion->prepare($sql);

 $ejec->BindParam(":idpersona",$id,PDO::PARAM_INT);

 echo $ejec->execute()



?>