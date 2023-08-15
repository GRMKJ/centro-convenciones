<?php 
require_once('../../../modelo/Organizador.php');
require_once('../../../modelo/Persona.php');
require_once('Security.php');

$organizador = new Organizador();
$placeholder = new organizador();
$persona = new Persona();
$placeholder2 = new Persona();
?>

<html>
<head>
    <title>CC Siglo XXI - Agregar organizadors</title>
    <link rel="icon" type="image/x-icon" href="..\..\..\imagenes\CULTURA1.png">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../../../css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(../../../imagenes/teatro.jpg);background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
<div class="container py-2 w-50">
<?php 
if (isset($_POST['ID'])) {
    $placeholder->traerDatos();
    $placeholder2->traerDatos();
    $error = $organizador->procedorganizador();
    if (count($error)==0){
        header("Location: index.php");
    }
    else{?>
        <div class="alert alert-danger" role="alert">
            <?='algo salio mal'?>
        </div>
        
    <?php
        }

    }
?>
</div>
<div class="container py-2 w-50">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Organizadores</a>
        <h2 class="mt-4 text-white">Agregar un organizador</h2>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="ID" value="">
    <input type="hidden" name="ID_PERSONA" value="">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>
        	<input type="text" name="NOMBRE" id="NOMBRE" placeholder="Nombre" value="<?=$placeholder2->NOMBRE?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Paterno</label>
        	<input type="text" name="A_PATERNO" id="A_PATERNO" placeholder="Apellido Paterno" value="<?=$placeholder2->A_PATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Materno</label>  
        	<input type="text" name="A_MATERNO"  id="A_MATERNO" placeholder="Apellido Materno" value="<?=$placeholder2->A_MATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Fecha de Nacimiento</label>  
        	<input type="date" name="FECHA_NAC"  value="<?=$placeholder2->FECHA_NAC?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Telefono</label>  
        	<input type="text" name="TELEFONO" placeholder="Telefono" value="<?=$placeholder2->TELEFONO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Razón Social</label>  
        	<input type="text" name="RAZONSOC" placeholder="Razón Social" value="<?=$placeholder->RAZONSOC?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Direccion</label>  
        	<input type="text" name="DIRECCION" placeholder="Domicilio Fiscal" value="<?=$placeholder->DIRECCION?>" class="form-control">
        </td>
    </tr>
     <tr>
        <td>
			<div class="form-group ms-2">
            <input type="hidden" name="ESTADO" value="1">
            <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Guardar</button>
			</div>
        </td>
    </tr>
    </table>
    </form>
</div>
</body>
</html>