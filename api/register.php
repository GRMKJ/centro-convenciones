<?php
require_once("class/conexion.php");

$datos = json_decode(file_get_contents('php://input'));


if($datos->passkey == "registeel"){
    $consulta = "INSERT INTO persona(ID,NOMBRE,A_PATERNO,A_MATERNO,FECHA_NAC,TELEFONO) VALUES (NULL, '".$datos->nombre."', '".$datos->apaterno."', '".$datos->amaterno."', NULL, '".$datos->telefono."');";
    $result = mysqli_query($mbd,$consulta);
    
    $consulta = "INSERT INTO usuario(ID,ID_PERSONA,ESTADO,CORREO,USERNAME,PASSWRD,ROL) VALUES (NULL,LAST_INSERT_ID(), 1 ,'".$datos->email."','".$datos->username."','".$datos->password."', 1 );";
    $result = mysqli_query($mbd,$consulta);

    $status = true;
    $answer = array("estatus" => $status, "mensaje" => "Creado" );
    header('Content-Type: application/json');
    header("HTTP/1.1 200 OK");
    echo json_encode($answer);

}
else{
    $status = false;
    $data = null;

    $answer = array("estatus" => $status );

    header('Content-Type: application/json');
    header("HTTP/1.1 403 FORBIDDEN");
    echo json_encode($answer);
}

