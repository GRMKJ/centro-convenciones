<?php 
require_once('../logica/Usuario.php');
require_once('../logica/Estado.php');
require_once('../logica/Rol.php');

$usuario = new Usuario();
$usuarios = $usuario->lista();
$estado = new Estado();
$estados = $estado->lista();
$rol = new Rol();
$roles = $rol->lista();

?>
<html>
<head>
  <title>PVAMP - Usuarios</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilo/estilo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de eliminar este elemento?")
      if (question !="0"){
          top.location = miurl;   }
  }
  </script>
</head>
<body>
<div class="container-fluid py-2">
  <div class="form-group">
    <a href="../index.html" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>&nbsp;Registrar nuevo Usuario</a>
  </div>
  <div class="form-group">
    <h2 class="mt-4">Lista de Usuarios</h2>
  </div>
  <table class="table table-striped bg-white">
    <tr>
        <td align="center"><b>Username</b></td>
        <td align="center"><b>Password</b></td>
        <td align="center"><b>Rol</b></td>
        <td align="center"><b>Nombre</b></td>
        <td align="center"><b>Apellidos</b></td>
        <td align="center"><b>Calle</b></td>
        <td align="center"><b>Numero Ext.</b></td>
        <td align="center"><b>Numero Int.</b></td>
        <td align="center"><b>Ciudad</b></td>
        <td align="center"><b>Estado</b></td>
        <td align="center"><b>Codigo Postal</b></td>
        <td align="center"><b>Correo</b></td>
        <td align="center"><b>Telefono 1</b></td>
        <td align="center"><b>Telefono 2</b></td>
        <td align="left"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($usuarios as $usuario) {
    ?>
    <tr>
        <td><span title="<?=$usuario->username?>"><?=$usuario->username?></span></td>
        <td><span title="<?=$usuario->password?>"><?=$usuario->password?></span></td>
        <?php
                foreach ($roles as $rol){
                  if($usuario->rol == $rol->id){
                ?>
                    <td><span title="<?=$usuario->rol?>"><?=$rol->rol?></span></td>
                <?php
                  } 
                }
        ?>
        <td><span title="<?=$usuario->nombre?>"><?=$usuario->nombre?></span></td>
        <td><span title="<?=$usuario->apellidos?>"><?=$usuario->apellidos?></span></td>
        <td><span title="<?=$usuario->calle?>"><?=$usuario->calle?></span></td>
        <td><span title="<?=$usuario->numero_ext?>"><?=$usuario->numero_ext?></span></td>
        <td><span title="<?=$usuario->numero_int?>"><?=$usuario->numero_int?></span></td>
        <td><span title="<?=$usuario->ciudad?>"><?=$usuario->ciudad?></span></td>
        <?php
                foreach ($estados as $estado){
                  if($usuario->estado == $estado->id){
                ?>
                    <td><span title="<?=$usuario->estado?>"><?=$estado->estado?></span></td>
                <?php
                  } 
                }
        ?>
        <td><span title="<?=$usuario->cp?>"><?=$usuario->cp?></span></td>
        <td><span title="<?=$usuario->correo?>"><?=$usuario->correo?></span></td>
        <td><span title="<?=$usuario->telefono1?>"><?=$usuario->telefono1?></span></td>
        <td><span title="<?=$usuario->telefono2?>"><?=$usuario->telefono2?></span></td>
        <td><a href="visualizar.php?id=<?=$usuario->id?>" title='Ver datalles del usuario'><img src="../images/view-list.svg"></a>&nbsp;<a href="modificar.php?id=<?=$usuario->id?>" title='Editar usuario'><img src="../images/pencil.svg"></a>&nbsp;<a href="" onClick="confirma('eliminar.php?id=<?=$usuario->id?>'); return false;" title='Eliminar usuario'><img src="../images/trash.svg"></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</td>
</body>
</html>