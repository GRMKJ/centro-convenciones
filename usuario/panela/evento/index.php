<?php 
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
  <link rel="icon" type="image/x-icon" href="..\..\..\imagenes\CULTURA1.png">
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

<div class="container-fluid w-75 py-2 z-1">
  <div class="form-group">
    <a href="../panela.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar nuevo evento</a>
  </div>
  <div class="form-group">
    <h2 class="mt-4 text-center" style="color:#ffffff;">Lista de eventos</h2>
  </div>
  <table class="table table-striped bg-white">
    <tr>
        <td align="center"><b>Nombre</b></td>
        <td align="center"><b>Tipo</b></td>
        <td align="center"><b>Duracion</b></td>
        <td align="center"><b>Organizador</b></td>
        <td align="left"><b>Acciones</b></td>
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
        <td><a href="visualizar.php?id=<?=$evento->ID?>" title='Ver datalles del evento'><img src="../../../imagenes/view-list.svg"></a>&nbsp;<a href="modificar.php?id=<?=$evento->ID?>" title='Editar evento'><img src="../../../imagenes/pencil.svg"></a>&nbsp;<a href="" onClick="confirma('eliminar.php?id=<?=$evento->ID?>'); return false;" title='Eliminar evento'><img src="../../../imagenes/trash.svg"></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</body>
</html>