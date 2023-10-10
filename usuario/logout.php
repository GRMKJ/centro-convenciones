<?php 
ob_start();
session_start();

if(isset($_SESSION['sesion'])){
    session_destroy();
}

header("Location: inicio.php"); // Redireccionamiento 
?>