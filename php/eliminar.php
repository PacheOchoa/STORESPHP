<?php
 include_once 'Conexion.php';

 $id = $_POST['idpersona'];

 $sql = "DELETE FROM asesores WHERE id=:ida";

 $ejec = $conexion->prepare($sql);

 $ejec->BindParam(":ida",$id,PDO::PARAM_INT);

 echo $ejec->execute()



?>