<?php 
require_once('../../../modelo/Evento.php');
require_once('../../../modelo/Sala.php');
require_once('../../../modelo/Cartelera.php');

$cartelera = new Cartelera();
$carteleras = $cartelera->lista();
$evento = new Evento();
$eventos = $evento->lista();
$sala = new Sala();
$salas = $sala->lista();

?>
<html>
<head>
  <title>CC Siglo XXI - Cartelera de Eventos</title>
  <link rel="icon" type="image/x-icon" href="..\..\..\imagenes\CULTURA1.png">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../../../css/estilo.css">
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
<div class="container-fluid py-2">
  <div class="form-group">
    <a href="../index.html" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar Evento en la Cartelera</a>
  </div>
  <div class="form-group">
    <h2 class="mt-4 text-center text-white">Cartelera de Eventos</h2>
  </div>
  <table class="table table-striped bg-white">
    <tr>
        <td align="center"><b>Nombre del Evento</b></td>
        <td align="center"><b>Lugar</b></td>
        <td align="center"><b>Fecha de Inicio</b></td>
        <td align="center"><b>Fecha de Fin</b></td>
        <td align="center"><b>Estado</b></td>
        <td align="left"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($carteleras as $cartelera) {
    ?>
    <tr>
    <?php
                foreach ($eventos as $evento){
                  if($cartelera->ID_EVENTO == $evento->ID){
                ?>
                    <td><span title="<?=$cartelera->ID_EVENTO?>"><?=$evento->NOMBRE?></span></td>
                <?php
                  } 
                }
        ?>
        <?php
                foreach ($salas as $sala){
                  if($cartelera->ID_SALA == $sala->ID){
                ?>
                    <td><span title="<?=$cartelera->ID_SALA?>"><?=$sala->NOMBRE?></span></td>
                <?php
                  } 
                }
        ?>
        <td><span title="<?=$cartelera->INICIO?>"><?=$cartelera->INICIO?></span></td>
        <td><span title="<?=$cartelera->FIN?>"><?=$cartelera->FIN?></span></td>
        <td><span title="<?=$cartelera->ESTADO?>"> 
                <?=($cartelera->ESTADO == 0)?"Desconocido":""?>
                <?=($cartelera->ESTADO == 1)?"Activo":""?>
                <?=($cartelera->ESTADO == 2)?"Agotado":""?>
                <?=($cartelera->ESTADO == 3)?"En Curso":""?>
                <?=($cartelera->ESTADO == 4)?"Cancelado":""?>
                <?=($cartelera->ESTADO == 5)?"Terminado":""?>
        </span></td>
        <td><a href="visualizar.php?id=<?=$evento->ID?>" title='Ver datalles del evento'><img src="../../../imagenes/view-list.svg"></a>&nbsp;<a href="modificar.php?id=<?=$evento->ID?>" title='Editar evento'><img src="../../../imagenes/pencil.svg"></a>&nbsp;<a href="" onClick="confirma('eliminar.php?id=<?=$evento->ID?>'); return false;" title='Eliminar evento'><img src="../../../imagenes/trash.svg"></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</td>
</body>
</html>