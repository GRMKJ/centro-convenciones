<?php 
require_once('../../../modelo/Evento.php');
require_once('../../../modelo/Organizador.php');
require_once('Security.php');

$evento = new Evento();
$organizador = new Organizador();
$organizadores = $organizador->lista();

if ($_GET['id']) {
    $evento->ID = $_GET['id'];
    $evento->recuperaRegistro($evento->ID);
}
?>
<html>
<head>
  <title>CC Siglo XXI - Evento: <?=$evento->NOMBRE?></title>
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

<div class="container w-50 py-2 justify-content-center">
  <div class="card mt-4">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        <h2 class="mt-4 ms-3 text-black">Detalles del evento</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$evento->ID?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label fw-bold">Nombre del Evento</label>
        </td>
        <td>
            <span><?=$evento->NOMBRE?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Tipo de Evento</label>
        </td>
        <td>
        	  <span>
                <?=($evento->TIPO == 0)?"Desconocido":""?>
                <?=($evento->TIPO == 'C')?"Conciertos y Festivales":""?>
                <?=($evento->TIPO == 'T')?"Teatro y Culturales":""?>
                <?=($evento->TIPO == 'D')?"Deportivos":""?>
                <?=($evento->TIPO == 'E')?"Especiales":""?>
                <?=($evento->TIPO == 'F')?"Familiares":""?>
            </span>
        </td>
    </tr>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Duracion del Evento</label>
        </td>
        <td>
        <span><?=$evento->DURACION?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Organizador del Evento</label>
        	<?php
          foreach ($organizadores as $organizador){
            if($evento->ID_ORGANIZADOR == $organizador->ID){
          ?>
              <td><span title="<?=$organizador->RAZONSOC?>"><?=$organizador->RAZONSOC?></span></td>
          <?php
            } 
          }
        ?>
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
</div>
</body>
</html>