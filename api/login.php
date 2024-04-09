<?php
require_once("class/conexion.php");
require_once("class/Usuario.php");
session_start();

$usuario = $_GET["userParam"];
$password = md5($_GET["passParam"]);


$consulta = "SELECT ID, ID_PERSONA, ESTADO, CORREO, USERNAME, ROL FROM usuario WHERE USERNAME = '".$usuario."' AND PASSWRD = '".$password."';";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $row = mysqli_fetch_assoc($result);

    $queryevento = "SELECT * FROM user WHERE ID = ".$row["ID_PERSONA"].";";
    $query = mysqli_query($mbd,$queryevento);
    $foundpersona = mysqli_fetch_assoc($query);
    $row += ["PERSONA" => $foundpersona];

    $answer = array("estatus" => $status, "usuario" => $row );
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

