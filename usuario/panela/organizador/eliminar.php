<?php require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');
require_once('../../../modelo/Organizador.php');

$organizador = new Organizador();
$persona = new Persona();

if (isset($_GET['id']) && isset($_GET['pid'])) {
    $organizador->eliminaRegistro($_GET['id']);
    $persona->eliminaRegistro($_GET['pid']);

}

header("Location: index.php"); // Redireccionamiento 
?>