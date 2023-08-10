<?php require_once('../logica/Usuario.php');?>
<?php 

$usuario = new Usuario();
if (isset($_GET['id'])) {
    $usuario->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>