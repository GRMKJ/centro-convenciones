<?php
require_once("class/conexion.php");
require_once("class/Usuario.php");

$usuario = $_POST["userParam"];
$password = md5($_POST["passParam"]);


$consulta = "SELECT ID, ID_PERSONA, ESTADO, CORREO, USERNAME, ROL FROM usuario WHERE USERNAME = '".$usuario."' AND PASSWRD = '".$password."';";

$result = mysqli_query($mbd,$consulta);

if (mysqli_num_rows($result) > 0){
    $status = true;
    $row = mysqli_fetch_assoc($result);

    $data = new Usuario($row["ID"],$row["ID_PERSONA"],$row["ESTADO"],$row["CORREO"],$row["USERNAME"],$row["ROL"]);

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
