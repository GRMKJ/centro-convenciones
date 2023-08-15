<?php 
session_start();
require_once('..\..\modelo\Usuario.php');

$ua = new Usuario();
if(isset($_SESSION['sesion'])){
    $ua->recuperaRegistro($_SESSION['sesion']);
}
else{
    header("Location: ..\inicio.php");
}

if($ua->ROL != 5){
    session_destroy();
    header("Location: ..\inicio.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <link rel="icon" type="image/x-icon" href="..\..\imagenes\CULTURA1.png">
  <title>CC Siglo XXI - Panel de Administración</title>
  <link rel="stylesheet" href="../../css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de que quieres Cerrar Sesion?")
      if (question !="0"){
          top.location = miurl;   }
    }
    </script>
</head>
<body style="background-color:#231c16">
    <!-- Carrusel -->
    <section class="w-100">
        <div>
            <div class="card position-absolute bg-black text-white w-100 z-n1">
                <img src="..\..\imagenes\teatro.jpg" class="bg-img w-100" />
                <div class="card-img-overlay text-light justify-content-center flex-column text-center pt-0 pt-lg-5" style="background-color: rgba(0, 0, 0, 0.5)">
                </div>
            </div>
        </div>

        <div class="container-fluid mb-xxl-5">
            <div class="row w-100 justify-content-center column-gap-5">
                <div class="col col-10 mt-5 mt-xxl-5 mb-xxl-5 col-xxl-3">
                    <div class="d-flex w-100 justify-content-center">
                        <div id="login" class="card mt-xxl-5 mb-xxl-5">
                            <div class="p-2">
                                <a id="filtrocartelera" class="btn btn-danger mt-2" href="" onClick="confirma('../logout.php'); return false;" title='Cerrar Sesion'>Cerrar Sesion</a>
                            </div>
                            <div class="d-flex mb-3 w-100 justify-content-center">
                                <svg  id="loginlogo" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </div>
                            <div class="d-flex p-3 w-100 justify-content-center">
                                <p class="fs-3 fw-bolder"> Panel de Control </p>
                            </div>
                            <div>
                                <div class="mt-1 p-2 ps-3 pe-3 ">
                                    <label for="usuario" class="form-label fw-bold">Bienvenido</label>
                                    <span><?php 
                                    if(isset($ua->USERNAME)){
                                        echo $ua->USERNAME;
                                    }  
                                    else{
                                        echo 'Test';
                                    }
                                    ?> </span>
                                </div>
                                <div class=" ps-3 pe-3 p-2 ">
                                    <label for="ROL" class="form-label fw-bold">ROL</label>
                                    <span><?php 
                                    if($ua->ROL==1){
                                        echo 'Usuario General';
                                    } 
                                    if($ua->ROL==2){
                                        echo 'Organizador';
                                    } 
                                    if($ua->ROL==3){
                                        echo 'Secretaria';
                                    } 
                                    if($ua->ROL==4){
                                        echo 'Jefe';
                                    } 
                                    if($ua->ROL==5){
                                        echo 'Administrador';
                                    } 
                                    else{
                                        echo 'Desconocido';
                                    }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-10 mt-5 mt-xxl-5 mb-xxl-5 col-xxl-5">
                    <div class="d-flex w-100 justify-content-center">
                        <div id="login" class="card mt-xxl-5 mb-xxl-5">
                            <div class="d-flex w-100 justify-content-center">
                                <p class="mt-5 fs-3 fw-bold"> Panel de Control </p>
                            </div>
                            <div class="container-fluid p-5">
                                <div class="row w-100 justify-content-center column-gap-2">
                                    <div class="col col-xxl-6">
                                        <a class="btn btn-danger w-100 btn-lg mt-2 mb-0" href="usuario/index.php" ROLe="button">Usuario</a><br>
                                        <a class="btn btn-danger w-100 btn-lg mt-2 mb-0" href="organizador/index.php" ROLe="button">Organizador</a><br>
                                    </div>
                                    <div class="col col-xxl-6">
                                        <a class="btn btn-danger w-100 btn-lg mt-2 mb-0" href="sala/index.php" ROLe="button">Sala</a><br>
                                        <a class="btn btn-danger w-100 btn-lg mt-2 mb-0" href="evento/index.php" ROLe="button">Evento</a><br>
                                        <a class="btn btn-danger w-100 btn-lg mt-2 mb-0" href="cartelera/index.php" ROLe="button">Cartelera</a><br> 
                                    </div>
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>