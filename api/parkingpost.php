<?php
require_once("class/conexion2.php");
require_once("class/Lista.php");

$datos = json_decode(file_get_contents('php://input'));
$lugares =  new Lista();

for($i=0;$i<count($datos->estacionamiento);$i++){
    $lugares->agregarUltimo($datos->estacionamiento[$i]);
}

if($datos->passkey == "contrasena"){
    
    for($i=0; $i<$lugares->getLength(); $i++){
        $consulta = "UPDATE estacionamiento SET ESTADO = ".$lugares->buscarIndice($i)->getVal()->estatus." WHERE ID = ".($lugares->buscarIndice($i)->getVal()->id).";";
        $result = mysqli_query($mbd,$consulta);
    }

    $status = true;
    $answer = array("estatus" => $status, "mensaje" => "Actualizado" );
    header('Content-Type: application/json');
    header("HTTP/1.1 200 OK");
    echo json_encode($answer);

}
else{
    $status = false;
    $data = null;

    $answer = array("estatus" => "Algo salio mal :(" );

    header('Content-Type: application/json');
    header("HTTP/1.1 403 FORBIDDEN");
    echo json_encode($answer);
}

