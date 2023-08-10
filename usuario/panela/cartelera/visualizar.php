<?php 
require_once('../logica/Usuario.php');
require_once('../logica/Estado.php');
require_once('../logica/Rol.php');

$usuario = new Usuario();
$estado = new Estado();
$estados = $estado->lista();
$rol = new Rol();
$roles = $rol->lista();

if ($_GET['id']) {
    $usuario->id = $_GET['id'];
    $usuario->recuperaRegistro($usuario->id);
}
?>
<html>
<head>
    <title>PVAMP - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container py-2">
    <div class="form-group">
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Usuarios</a>
        <h2 class="mt-4">Detalles del usuario</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$usuario->id?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label">Username</label>
        </td>
        <td>
            <span><?=$usuario->username?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Password</label>
        </td>
        <td>
            <span><?=$usuario->password?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Rol</label>
        </td>
        <?php
            foreach ($roles as $rol){
                if($usuario->rol == $rol->id){
            ?>
                <td>
                    <span title="<?=$usuario->rol?>"><?=$rol->rol?></span>
                </td>
            <?php
                } 
            }
        ?>         
    </tr>
    <tr>
        <td>
        	<label class="control-label">Nombre</label>  
        </td>
        <td>
            <span><?=$usuario->nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Apellidos</label>
       	</td>
        <td>
            <span><?=$usuario->apellidos?></span>
        </td>
    </tr>
    
    <tr>
        <td>
        	<label class="control-label">Calle</label>
        </td>
        <td>
            <span><?=$usuario->calle?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Numero Ext.</label>
        </td>
        <td>
            <span><?=$usuario->numero_ext?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Numero Int.</label>
        </td>
        <td>
            <span><?=$usuario->numero_int?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Ciudad</label>
        </td>
        <td>
            <span><?=$usuario->ciudad?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Estado</label>
        </td>
        <?php
            foreach ($estados as $estado){
                if($usuario->estado == $estado->id){
            ?>
                <td>
                    <span title="<?=$usuario->estado?>"><?=$estado->estado?></span>
                </td>
            <?php
                } 
            }
        ?>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Codigo Postal</label>
        </td>
        <td>
            <span><?=$usuario->cp?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Correo</label>
        </td>
        <td>
            <span><?=$usuario->correo?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Telefono 1</label>
        </td>
        <td>
            <span><?=$usuario->telefono1?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label">Telefono 2</label>
        </td>
        <td>
            <span><?=$usuario->telefono2?></span>
        </td>        
     </tr>
     <tr>
        <td colspan="2">
			<div class="form-group">
                <button type="submit" formaction="index.php" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Guardar</button>
			</div>
        </td>
    </tr>
  </table>
    </form>
</div>
</body>
</html>