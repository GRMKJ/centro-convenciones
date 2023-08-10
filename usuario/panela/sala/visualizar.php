<?php 
require_once('../../../modelo/Sala.php');

$sala = new Sala();


if ($_GET['id']) {
    $sala->ID = $_GET['id'];
    $sala->recuperaRegistro($sala->ID);
}
?>
<html>
<head>
  <title>CC Siglo XXI - Ver salas</title>
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

<div class="container w-75 py-2">
    <div class="form-group">
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Salas</a>
        <h2 class="mt-4 text-white">Detalles del Sala</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$sala->ID?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label">Nombre</label>
        </td>
        <td>
            <span><?=$sala->NOMBRE?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Estado</label>
        </td>
        <td>
            <span><?=$sala->ESTADO?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Asientos</label>
        </td>
        <td>
        <span><?=$sala->ASIENTOS?></span>
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