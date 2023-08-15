<?php 
require_once('../../../modelo/Evento.php');
require_once('../../../modelo/Organizador.php');
require_once('Security.php');

$evento = new Evento();
$placeholder = new Evento();
$organizador = new Organizador();
$organizadores = $organizador->lista();

?>
<html>
<head>
  <title>CC Siglo XXI - Modificar Evento</title>
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

<div class="container py-2">
    <?php
    if (isset($_POST['ID'])) {
        
        $error = $evento->actualizaRegistro();
        
        if (count($error)==0){
            header("Location: index.php");
        }
        else {
            foreach ($error as $errores){?>
                <div class="alert alert-danger" role="alert">
                    <?=$errores?>
                </div> 
            <?php
            $evento->recuperaRegistro($evento->ID);
            }
        }
    }
    else{
        $evento->ID = $_GET['id'];
        $evento->recuperaRegistro($evento->ID);

    }
    ?>
</div>
<div class="container py-2 w-50">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Evento</a>
        <h2 class="mt-4 text-white">Modificar un evento</h2>
    </div>
    <form name="frmInsProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$evento->ID?>">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>
        	<input type="text" name="NOMBRE" placeholder="Nombre de la evento" value="<?=$evento->NOMBRE?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Tipo</label>
        	<select class="form-select" name="TIPO">
                <option value="0" <?=($evento->TIPO == 0)?"selected":""?>>Selecciona un Organizador</option>
                <option value="C" <?=($evento->TIPO == 'C')?"selected":""?>>Conciertos y Festivales</option>
                <option value="T" <?=($evento->TIPO == 'T')?"selected":""?>>Teatro y Culturales</option>
                <option value="D" <?=($evento->TIPO == 'D')?"selected":""?>>Deportivos</option>
                <option value="E" <?=($evento->TIPO == 'E')?"selected":""?>>Especiales</option>
                <option value="F" <?=($evento->TIPO == 'F')?"selected":""?>>Familiares</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Duracion (en horas:minutos)</label>
        	<input type="time" name="DURACION" placeholder="Duracion" value="<?=$evento->DURACION?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Organizador</label>
        	<select class="form-select" name="ID_ORGANIZADOR">
                <option value="0">Selecciona un Organizador</option>
                <?php
                foreach ($organizadores as $organizador){
                ?>
                    <option value="<?=$organizador->ID?>" <?=($evento->ID_ORGANIZADOR == $organizador->ID)?"selected":""?>> <?=$organizador->RAZONSOC?></option>
                <?php 
                }
                ?>            
            </select>
        </td>
     </tr>
     <tr>
        <td>
			<div class="form-group ms-2">
            <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Guardar</button>
			</div>
        </td>
    </tr>
    </table>
    </form>
</div>
</body>
</html>