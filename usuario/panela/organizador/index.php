<?php 
require_once('../../../modelo/Organizador.php');
require_once('../../../modelo/Persona.php');
require_once('../../../modelo/Usuario.php');

$organizador = new Organizador();
$organizadores = $organizador->lista();
$persona =  new Persona();
$personas = $persona->lista();
$usuario =  new Usuario();
$usuarios = $usuario->lista();

?>
<html>
<head>
  <title>CC Siglo XXI - Lista de organizadors</title>
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

<div class="container-fluid py-2 z-1">
  <div class="form-group">
    <a href="../panela.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar nuevo organizador</a>
  </div>
  <div class="form-group">
    <h2 class="mt-4 text-center mb-4" style="color:#ffffff;">Lista de Organizadores</h2>
  </div>
  <table class="table table-striped bg-white">
    <tr>
        <td align="center"><b>Nombre</b></td>
        <td align="center"><b>Apellido Paterno</b></td>
        <td align="center"><b>Apellido Materno</b></td>
        <td align="center"><b>Fecha Nacimiento</b></td>
        <td align="center"><b>Telefono</b></td>
        <td align="center"><b>Razon Social</b></td>
        <td align="center"><b>Direccion</b></td>
        <td align="center"><b>Estado</b></td>
        <td align="left"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($organizadores as $organizador) {
    ?>
    <tr>
    <?php
          foreach ($personas as $persona){
            if($organizador->ID_PERSONA == $persona->ID){
          ?>
              <td><span title="<?=$persona->NOMBRE?>"><?=$persona->NOMBRE?></span></td>
              <td><span title="<?=$persona->A_PATERNO?>"><?=$persona->A_PATERNO?></span></td>
              <td><span title="<?=$persona->A_MATERNO?>"><?=$persona->A_MATERNO?></span></td>
              <td><span title="<?=$persona->FECHA_NAC?>"><?=$persona->FECHA_NAC?></span></td>
              <td><span title="<?=$persona->TELEFONO?>"><?=$persona->TELEFONO?></span></td>
          <?php
            } 
          }
        ?>
        <td><span title="<?=$organizador->RAZONSOC?>"><?=$organizador->RAZONSOC?></span></td>
        <td><span title="<?=$organizador->DIRECCION?>"><?=$organizador->DIRECCION?></span></td>
        <td><span title="<?=$organizador->ESTADO?>"><?=$organizador->ESTADO?></span></td>
        <td><a href="visualizar.php?id=<?=$organizador->ID?>&pid=<?=$organizador->ID_PERSONA?>" title='Ver datalles del organizador'><img src="../../../imagenes/view-list.svg"></a>&nbsp;<a href="modificar.php?id=<?=$organizador->ID?>&pid=<?=$organizador->ID_PERSONA?>" title='Editar organizador'><img src="../../../imagenes/pencil.svg"></a>&nbsp;<a href="" onClick="confirma('eliminar.php?id=<?=$organizador->ID?>&pid=<?=$organizador->ID_PERSONA?>'); return false;" title='Eliminar organizador'><img src="../../../imagenes/trash.svg"></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</body>
</html>