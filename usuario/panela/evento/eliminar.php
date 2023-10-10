<?php 
ob_start();
require_once('../../../modelo/Evento.php');
require_once('Security.php');


$evento = new Evento();
if (isset($_GET['id'])) {
    $evento->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>