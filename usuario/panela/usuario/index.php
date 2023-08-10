<?php 
require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');

$usuario = new Usuario();
$usuarios = $usuario->lista();
$persona =  new Persona();
$personas = $persona->lista();

?>
<html>
<head>
  <title>CC Siglo XXI - Lista de Usuarios</title>
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
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar nuevo Usuario</a>
  </div>
  <div class="form-group">
    <h2 class="mt-4 text-center" style="color:#ffffff;">Lista de Usuarios</h2>
  </div>
  <table class="table table-striped bg-white">
    <tr>
        <td align="center"><b>Nombre</b></td>
        <td align="center"><b>Apellido Paterno</b></td>
        <td align="center"><b>Apellido Materno</b></td>
        <td align="center"><b>Fecha Nacimiento</b></td>
        <td align="center"><b>Telefono</b></td>
        <td align="center"><b>Username</b></td>
        <td align="center"><b>Password</b></td>
        <td align="center"><b>Correo</b></td>
        <td align="center"><b>Rol</b></td>
        <td align="center"><b>Estado</b></td>
        <td align="left"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($usuarios as $usuario) {
    ?>
    <tr>
    <?php
          foreach ($personas as $persona){
            if($usuario->ID_PERSONA == $persona->ID){
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
        <td><span title="<?=$usuario->USERNAME?>"><?=$usuario->USERNAME?></span></td>
        <td><span title="<?=$usuario->PASSWRD?>"><?=$usuario->PASSWRD?></span></td>
        <td><span title="<?=$usuario->CORREO?>"><?=$usuario->CORREO?></span></td>
        <td><span title="<?=$usuario->ROL?>"><?=$usuario->ROL?></span></td>
        <td><span title="<?=$usuario->ESTADO?>"><?=$usuario->ESTADO?></span></td>
        <td><a href="visualizar.php?id=<?=$usuario->ID?>&pid=<?=$usuario->ID_PERSONA?>" title='Ver datalles del usuario'><img src="../../../imagenes/view-list.svg"></a>&nbsp;<a href="modificar.php?id=<?=$usuario->ID?>&pid=<?=$usuario->ID_PERSONA?>" title='Editar usuario'><img src="../../../imagenes/pencil.svg"></a>&nbsp;<a href="" onClick="confirma('eliminar.php?id=<?=$usuario->ID?>&pid=<?=$usuario->ID_PERSONA?>'); return false;" title='Eliminar usuario'><img src="../../../imagenes/trash.svg"></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</body>
</html>