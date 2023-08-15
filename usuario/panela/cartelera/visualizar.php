<?php 
require_once('../../../modelo/Evento.php');
require_once('../../../modelo/Cartelera.php');
require_once('../../../modelo/Sala.php');
require_once('Security.php');

$cartelera = new Cartelera();
$sala = new Sala();
$salas = $sala->lista();
$evento = new Evento();
$eventos = $evento->lista();

if ($_GET['id']) {
    $cartelera->ID = $_GET['id'];
    $cartelera->recuperaRegistro($cartelera->ID);
}
?>
<html>
<head>
  <title>CC Siglo XXI - Detalles de la Cartelera</title>
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

<div class="container w-75 py-2">
    <div class="form-group">
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;eventos</a>
        <h2 class="mt-4 text-white">Detalles del evento</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$evento->ID?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label">Nombre del Evento</label>
        </td>
        <?php
          foreach ($eventos as $evento){
            if($cartelera->ID_EVENTO == $evento->ID){
          ?>
              <td><span title="<?=$evento->NOMBRE?>"><?=$evento->NOMBRE?></span></td>
          <?php
            } 
          }
        ?>
        </td>        
    </tr>
    <tr>
        <td>
          <label class="control-label ms-2">Sala del Evento</label>
        </td>
        <?php
          foreach ($salas as $sala){
            if($cartelera->ID_SALA == $sala->ID){
          ?>
              <td><span title="<?=$sala->NOMBRE?>"><?=$sala->NOMBRE?></span></td>
          <?php
            } 
          }
        ?>
    </tr>
        </td>        
    </tr>
    <tr>
        <td>
          <label class="control-label ms-2">Fecha de Inicio</label>
        </td>
        <td>
        <span><?=$cartelera->INICIO?></span>
        </td>        
    </tr>
    <tr>
        <td>
          <label class="control-label ms-2">Fecha de Fin</label>
        </td>  
        <td>
        	<span><?=$cartelera->FIN?></span>
        </td> 
     </tr>
     <tr>
        <td>
          <label class="control-label ms-2">Estado del Evento</label>
        </td>  
        <td>
        	<span><?=($cartelera->ESTADO == 0)?"Desconocido":""?>
                <?=($cartelera->ESTADO == 1)?"Activo":""?>
                <?=($cartelera->ESTADO == 2)?"Agotado":""?>
                <?=($cartelera->ESTADO == 3)?"Curso":""?>
                <?=($cartelera->ESTADO == 4)?"Cancelado":""?>
                <?=($cartelera->ESTADO == 5)?"Terminado":""?></span>
        </td> 
     </tr>
     <tr>
        <td colspan="2">
          <div class="form-group">
            <button type="submit" formaction="index.php" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Regresar</button>
          </div>
        </td>
    </tr>
  </table>
    </form>
</div>
</body>
</html>