<?php
require_once("class/conexion.php");

$consulta = "SELECT ID, NOMBRE, ESTADO FROM estacionamiento;";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $row = mysqli_fetch_assoc($result);

    $answer = array("estatus" => $status, "usuario" => $data );
    header('Content-Type: application/json');
    header("HTTP/1.1 200 OK");
    echo json_encode($answer);

}
else{
    $status = false;
    $data = null;

    $answer = array("estatus" => $status, "usuario" => $data );

    header('Content-Type: application/json');
    header("HTTP/1.1 403 FORBIDDEN");
    echo json_encode($answer);
}

