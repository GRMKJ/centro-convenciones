<?php 
ob_start();
require_once('../../../modelo/Evento.php');
require_once('../../../modelo/Organizador.php');
require_once('Security.php');

$evento = new Evento();
$eventos = $evento->lista();
$organizador = new Organizador();
$organizadores = $organizador->lista();

?>
<html>
<head>
  <title>CC Siglo XXI - Lista de Eventos</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="../../../imagenes/CULTURA1.png">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../../../css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de eliminar este elemento?")
      if (question !="0"){
          top.location = miurl;   }
  }
  </script>
</head>
<body style="background-image: url(../../../imagenes/teatro.jpg);background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
<header class="w-100">
        <nav class="navbar navbar-expand-lg ps-lg-2 pe-lg-2 ps-xll-5 pe-xll-5">
            <div class="container-fluid">
                <a id="logos" class="navbar-brand me-auto me-lg-5" aria-current="page" href="../panela.php">
                <img  id="logo" src="../../../identidad/CULTURA1White.png" class="img-fluid float-end w-auto" alt="logo">
                </a>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="bi bi-list"></i></span>
            </button>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#userSupportedContent" aria-controls="userSupportedContent" aria-expanded="false" aria-label="Toggle User">
                <span><i class="bi bi-person-fill"></i></span>
            </button>
            <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
                <div class="container justify" id="navbar">
                <div class="container rounded" id="navbart">
                    <ul class="nav nav-pills nav-fill justify-content-center me-auto mt-3 mb-3 mb-lg-0">
                    <li class="nav-item m-0">
                        <a class="nav-link align-middle text-white" href="../usuario/index.php">Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="../organizador/index.php">Organizador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="../sala/index.php">Sala</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active align-middle text-white" href="index.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  align-middle text-white" href="../cartelera/index.php">Cartelera</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="collapse navbar-collapse ms-2" id="userSupportedContent">
                <div class="container" id="navbar">
                    <div class="container" id="navbar">
                    <ul class="navbar-nav justify-content-center me-auto mt-3 mb-2 mb-lg-0">
                    <li class="nav-item m-0">
                        <label class="dropdown-item">Usuario Activo: <?=$ua->USERNAME?></label>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="../../logout.php">Cerrar Sesión</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="navbar-brand align-middle" id="userslong"> 
                <div class="btn-group ms-lg-5 mt-1">
                <button id="useraccess" type="button" class="btn btn-lg dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill" ></i>
                </button>
                <ul id="useraccesslist" class="dropdown-menu">
                    <li><label class="dropdown-item">Usuario Activo: <?=$ua->USERNAME?></label></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../logout.php">Cerrar Sesión</a></li>
                </ul>
                </div>
            </div> 
            </div>
        </nav>
    </header>
<div class="container-fluid w-100 mt-4 py-2 z-1">
  <div class="card py-2 m-5">
      <div class="row justify-content-center">
        <div class="col-2 ps-2 mt-4">
          <a href="../panela.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        </div>
        <div class="col-8">
          <h2 class="mt-4 text-center text-black">Lista de Eventos</h2>
        </div>
        <div class="col-2 ps-5 mt-4 align-items-end">
          <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar Evento</a>
        </div>
      </div> 
      <table class="table table-striped bg-white">
        <tr>
            <td align="center"><b>Nombre</b></td>
            <td align="center"><b>Tipo</b></td>
            <td align="center"><b>Duracion</b></td>
            <td align="center"><b>Organizador</b></td>
            <td align="center"><b>Acciones</b></td>
        </tr>
        <?php
        foreach ($eventos as $evento) {
        ?>
        <tr>
            <td><span title="<?=$evento->NOMBRE?>"><?=$evento->NOMBRE?></span></td>
            <td><span title="<?=$evento->TIPO?>">
                    <?=($evento->TIPO == 0)?"Desconocido":""?>
                    <?=($evento->TIPO == 'C')?"Conciertos y Festivales":""?>
                    <?=($evento->TIPO == 'T')?"Teatro y Culturales":""?>
                    <?=($evento->TIPO == 'D')?"Deportivos":""?>
                    <?=($evento->TIPO == 'E')?"Especiales":""?>
                    <?=($evento->TIPO == 'F')?"Familiares":""?>
            </span></td>
            <td><span title="<?=$evento->DURACION?>"><?=$evento->DURACION?></span></td>
            <?php
              foreach ($organizadores as $organizador){
                if($evento->ID_ORGANIZADOR == $organizador->ID){
              ?>
                  <td><span title="<?=$organizador->RAZONSOC?>"><?=$organizador->RAZONSOC?></span></td>
              <?php
                } 
              }
            ?>
            <td align="right"><a class="btn btn-primary" href="visualizar.php?id=<?=$evento->ID?>" title='Ver datalles del evento'><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;<a class="btn btn-warning" href="modificar.php?id=<?=$evento->ID?>" title='Editar evento'><i class="bi bi-pencil"></i>&nbsp;Editar Evento</a>&nbsp;<a class="btn btn-danger" href="" onClick="confirma('eliminar.php?id=<?=$evento->ID?>'); return false;" title='Eliminar evento'><i class="bi bi-trash3"></i>&nbsp;Eliminar Evento</a></td>
        </tr>
        <?php
        }
        ?>
      </table>
  </div>
</div>
</body>
</html>