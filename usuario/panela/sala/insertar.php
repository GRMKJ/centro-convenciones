<?php 
require_once('../../../modelo/Sala.php');
require_once('Security.php');

$sala = new Sala();
$placeholder = new Sala();


?>
<html>
<head>
    <title>CC Siglo XXI - Agregar Sala</title>
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
    $error = $sala->insertaRegistro();
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
<div class="container py-2 w-50 justify-content-center">
    <div class="card">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Sala</a>
        <h2 class="mt-4 text-black ms-5 ">Agregar un sala</h2>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="ID" value="null">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>
        	<input type="text" name="NOMBRE" placeholder="Nombre de la Sala" value="<?=$placeholder->NOMBRE?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Estado</label>
        	<select class="form-select" name="ESTADO">
                <option value="0" <?=($placeholder->ESTADO == 0)?"selected":""?>>No Disponible</option>
                <option value="1" <?=($placeholder->ESTADO == 1)?"selected":""?>>Activo</option>
                <option value="2" <?=($placeholder->ESTADO == 2)?"selected":""?>>En Mantenimiento</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Asientos</label>
        	<input type="text" name="ASIENTOS" placeholder="Asientos" value="<?=$placeholder->ESTADO?>" class="form-control">
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