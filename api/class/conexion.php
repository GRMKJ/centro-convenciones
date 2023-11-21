<?php
    $host ="srv1201.hstgr.io";
	$user = "u544793699_ccomplexu";
	$contraseña = "Tortademilanesa7";
	$database = "u544793699_ccsxxi";
	$consulta;

    $mbd = new mysqli($host,$user,$contraseña,$database);

    if (!$mbd){
        die("Algo salio mal :(");
    }