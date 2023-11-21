<?php
require_once("class/conexion.php");

$consulta = "SELECT ID, NOMBRE, ESTADO FROM estacionamiento;";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $answer = array();

    foreach($rows as $row){
        array_push($answer,$row);
    }
    
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

