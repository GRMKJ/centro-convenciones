<?php
    $host ="srv1201.hstgr.io";
	$user = "u544793699_carlos18";
	$contraseña = "Tortademilanesa7";
	$database = "u544793699_ccsxxilaravel";
	$consulta;

    $mbd = new mysqli($host,$user,$contraseña,$database);

    if (!$mbd){
        die("Algo salio mal :(");
    }