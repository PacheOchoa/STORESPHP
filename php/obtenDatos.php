<?php


 include_once 'Conexion.php';

$idpersona = $_POST['idpersona'];
 $sql = "call sp_obtener_datosPersona(:idpersona)";

 $res = $conexion->prepare($sql);

 $res->BindParam(':idpersona',$idpersona,PDO::PARAM_INT);

 $res->execute();

 //MOSTRAR el array con index
 $datos = $res->fetch(PDO::FETCH_NUM);

 
  

  $persona = array('id' =>$datos[0],
                   'nombre' => $datos[1],
                   'ApellidoPaterno' => $datos[2],
                   'ApellidoMaterno' => $datos[3],
                   'Edad' => $datos[4]
); 

echo json_encode($persona);








?>