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

?>
<html>
<head>
  <title>CC Siglo XXI - Modificar Evento en la Cartelera</title>
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
        
        $error = $cartelera->actualizaRegistro();
        
        if (count($error)==0){
            header("Location: index.php");
        }
        else {
            foreach ($error as $errores){?>
                <div class="alert alert-danger" role="alert">
                    <?=$errores?>
                </div> 
            <?php
            $cartelera->recuperaRegistro($evento->ID);
            }
        }
    }
    else{
        $cartelera->ID = $_GET['id'];
        $cartelera->recuperaRegistro($cartelera->ID);

    }
    ?>
</div>
<div class="container py-2 w-50  justify-content-center">
    <div class="card">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        <h2 class="mt-4 text-black ms-4">Modificar un Evento en Cartelera</h2>
    </div>
    <form name="frmInsProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$cartelera->ID?>">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Nombre del Evento</label>
        	<select class="form-select" name="ID_EVENTO">
                <option value="0">Selecciona un Evento</option>
                <?php
                foreach ($eventos as $evento){
                ?>
                    <option value="<?=$evento->ID?>" <?=($cartelera->ID_EVENTO == $evento->ID)?"selected":""?>> <?=$evento->NOMBRE?></option>
                <?php 
                }
                ?>            
            </select>        
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Sala del Evento</label>
        	<select class="form-select" name="ID_SALA">
                <option value="0">Selecciona una Sala</option>
                <?php
                foreach ($salas as $sala){
                ?>
                    <option value="<?=$sala->ID?>" <?=($cartelera->ID_EVENTO == $sala->ID)?"selected":""?>> <?=$sala->NOMBRE?></option>
                <?php 
                }
                ?>            
            </select> 
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Fecha de Inicio</label>
        	<input type="datetime-local" name="INICIO" id="INICIO" placeholder="Duracion" value="<?=$cartelera->INICIO?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Fecha de Fin</label>
        	<input type="datetime-local" name="FIN" id="FIN" placeholder="Duracion" value="<?=$cartelera->FIN?>" class="form-control">
        </td>
     </tr>
     <script>
        document.getElementById("INICIO").valueAsDate = new Date();
        document.getElementById("FIN").valueAsDate = addDays(document.getElementById("FIN").valueAsDate,5);
    </script>
     <tr>
        <td>
        	<label class="control-label ms-2">Estado del Evento</label>
        	<select class="form-select" name="ESTADO">
                <option value="0" <?=($cartelera->ESTADO == 0)?"selected":""?>>Selecciona un Estado</option>
                <option value="1" <?=($cartelera->ESTADO == 1)?"selected":""?>>Activo</option>
                <option value="2" <?=($cartelera->ESTADO == 2)?"selected":""?>>Agotado</option>
                <option value="3" <?=($cartelera->ESTADO == 3)?"selected":""?>>En Curso</option>
                <option value="4" <?=($cartelera->ESTADO == 4)?"selected":""?>>Cancelado</option>
                <option value="5" <?=($cartelera->ESTADO == 5)?"selected":""?>>Terminado</option>
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
</div>
</body>
</html>