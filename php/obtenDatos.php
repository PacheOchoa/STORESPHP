<?php


 include_once 'Conexion.php';

$idpersona = $_POST['idpersona'];
 $sql = "call sp_obtener_datosPersona(:idpersona)";

 $res = $conexion->prepare($sql);

 $res->BindParam(':idpersona',$idpersona,PDO::PARAM_INT);

 $res->execute();

 //MOSTRAR el array con index
 $datos = $res->fetch(PDO::FETCH_NUM);

 
  

  $persona = array('idpersona' =>$datos[0],
                   'NombreU' => $datos[1],
                   'ApellidoPaternoU' => $datos[2],
                   'ApellidoMaternoU' => $datos[3],
                   'EdadU' => $datos[4]
); 

echo json_encode($persona);








?>