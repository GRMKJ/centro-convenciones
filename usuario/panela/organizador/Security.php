<?php 
session_start();
require_once('../../../modelo/Usuario.php');

$ua = new Usuario();
if(isset($_SESSION['sesion'])){
    $ua->recuperaRegistro($_SESSION['sesion']);
}
else{
    header("Location: ../../inicio.php");
}

if($ua->ROL != 5){
    session_destroy();
    header("Location: ../../inicio.php");
}
?>