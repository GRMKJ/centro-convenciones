<?php
    $host ="localhost";
	$user = "root";
	$contraseña = "";
	$database = "ccsxxi";
	$tabla = "usuario";
	$consulta;

    $mbd = new mysqli($host,$user,$contraseña,$database);

    if (!$mbd){
        die("Algo salio mal :(");
    }