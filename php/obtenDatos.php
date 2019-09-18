<?php


 include_once 'Conexion.php';

$idpersona = $_POST['idpersona'];
 $sql = "SELECT id,nombre_asesores FROM asesores WHERE id=:ida";

 $res = $conexion->prepare($sql);

 $res->BindParam(':ida',$idpersona,PDO::PARAM_INT);

 $res->execute();

 //MOSTRAR el array con index
 $datos = $res->fetch(PDO::FETCH_NUM);

 
  

  $persona = array('id' =>$datos[0],
                   'nombre' => $datos[1]
                   
); 

echo json_encode($persona);








?>