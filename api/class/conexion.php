<?php
    $host ="localhost";
	$user = "wckpxbemht";
	$contraseña = "522HWUAWU62WI661$";
	$database = "u544793699_ccsxxi";
	$consulta;

    $mbd = new mysqli($host,$user,$contraseña,$database);

    if (!$mbd){
        die("Algo salio mal :(");
    }