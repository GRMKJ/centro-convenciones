<?php 
require_once('../../../modelo/Organizador.php');
require_once('../../../modelo/Persona.php');
require_once('Security.php');

$organizador = new Organizador();
$persona = new Persona();


if ($_GET['id']) {
    $organizador->ID = $_GET['id'];
    $organizador->recuperaRegistro($organizador->ID);
    $persona->recuperaRegistro($organizador->ID_PERSONA);
}
?>
<html>
<head>
  <title>CC Siglo XXI - Ver Organizadores</title>
  <link rel="icon" type="image/x-icon" href="..\..\..\imagenes\CULTURA1.png">
  <meta name="viewport" content="wIDth=device-wIDth,initial-scale=1">
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
    <div class="form-group">
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Organizadores</a>
        <h2 class="mt-4 text-white">Detalles del Organizador</h2>
    </div>
    <form name="frmModProd" method="post" action="index.php">
    <input type="hIDden" name="ID" value="<?=$organizador->ID?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label">Razon Social</label>
        </td>
        <td>
            <span><?=$organizador->RAZONSOC?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Dirección</label>
        </td>
        <td>
            <span><?=$organizador->DIRECCION?></span>
        </td>        
    </tr>
    <tr>
        <td colspan="2  ">
        	<label align="center" class="control-label">Persona de Contacto</label>
        </td>       
    </tr>
    <tr>
        <td>
        	<label class="control-label">Nombre</label>
        </td>
        <td>
            <span><?=$persona->NOMBRE?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Apellido Paterno</label>  
        </td>
        <td>
            <span><?=$persona->A_PATERNO?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Apellido Materno</label>
       	</td>
        <td>
            <span><?=$persona->A_MATERNO?></span>
        </td>
    </tr>
    
    <tr>
        <td>
        	<label class="control-label">Fecha de Nacimiento</label>
        </td>
        <td>
            <span><?=$persona->FECHA_NAC?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Telefono</label>
        </td>
        <td>
            <span><?=$persona->TELEFONO?></span>
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