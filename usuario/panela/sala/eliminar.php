<?php 
require_once('../../../modelo/Sala.php');
require_once('Security.php');

$sala = new Sala();
if (isset($_GET['id'])) {
    $sala->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>