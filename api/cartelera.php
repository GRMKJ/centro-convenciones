<?php
require_once("class/conexion.php");
require_once("class/Cartelera.php");

$consulta = "SELECT ID, ID_EVENTO, ID_SALA, ESTADO, INICIO, FIN FROM CARTELERA WHERE ESTADO = '1' ORDER BY INICIO DESC LIMIT 5;";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cartelera = array();

    foreach ($rows as $row){
        $queryevento = "SELECT ";
        $evento = mysqli_fetch_assoc();

        array_push($cartelera,$row);
    }


    $answer = array("cartelera" => $cartelera);
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
