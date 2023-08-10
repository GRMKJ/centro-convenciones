<?php 
require_once('../../../modelo/Sala.php');

$sala = new Sala();
if (isset($_GET['id'])) {
    $sala->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>