<?php
require_once("class/conexion.php");
require_once("class/Cartelera.php");



$idevento = $_GET["id"]; 

$consulta = "SELECT * FROM cartelera WHERE ID = $idevento ;";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $row = mysqli_fetch_assoc($result);
    $cartelera = array();

    $queryevento = "SELECT * FROM evento WHERE ID = ".$row["ID_EVENTO"].";";
    $evento = mysqli_query($mbd,$queryevento);
    $foundevento = mysqli_fetch_assoc($evento);
    $row += ["EVENTO" => $foundevento];

    $querysala = "SELECT * FROM sala WHERE ID = ".$row["ID_SALA"].";";
    $sala = mysqli_query($mbd,$querysala);
    $foundsala = mysqli_fetch_assoc($sala);
    $row += ["SALA" => $foundsala];

    array_push($cartelera,$row);
    


    $answer = array("evento" => $cartelera);
    header('Content-Type: application/json');
    header("HTTP/1.1 200 OK");
    echo json_encode($answer);

}
else{
    $status = false;
    $data = null;

    $answer = array("cartelera" => "Algo salio mal" );

    header('Content-Type: application/json');
    header("HTTP/1.1 403 FORBIDDEN");
    echo json_encode($answer);
}

