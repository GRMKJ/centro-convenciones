<?php require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');

$persona = new Persona();
$usuario = new Usuario();
if (isset($_GET['id']) && isset($_GET['pid'])) {
    $usuario->eliminaRegistro($_GET['id']);
    $persona->eliminaRegistro($_GET['pid']);
}

header("Location: index.php"); // Redireccionamiento 
?>