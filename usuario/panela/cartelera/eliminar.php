<?php 
require_once('../../../modelo/Evento.php');

$evento = new Evento();
if (isset($_GET['id'])) {
    $evento->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>