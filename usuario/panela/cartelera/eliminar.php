<?php 
require_once('../../../modelo/Cartelera.php');

$cartelera = new Cartelera();
if (isset($_GET['id'])) {
    $cartelera->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>