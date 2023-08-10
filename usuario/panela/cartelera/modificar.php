<?php 
require_once('../logica/Usuario.php');
require_once('../logica/Estado.php');
require_once('../logica/Rol.php'); 

$usuario = new Usuario();
$estado = new Estado();
$estados = $estado->lista();
$rol = new Rol();
$roles = $rol->lista();

?>
<html>
<head>
    <title>PVAMP - Modificar Usuario</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container py-2">
    <?php
    if (isset($_POST['id'])) {
        $error = $usuario->actualizaRegistro();
        if (count($error)==0){
            header("Location: index.php");
        }

         
        else {
            foreach ($error as $errores){?>
                <div class="alert alert-danger" role="alert">
                    <?=$errores?>
                </div> 
            <?php
            $usuario->recuperaRegistro($usuario->id);
            }
        }
    }
    else{
        $usuario->id = $_GET['id'];
        $usuario->recuperaRegistro($usuario->id);
    }
    ?>
    <div class="form-group">
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i>&nbsp;Usuarios</a>
        <h2 class="mt-4">Modificar un usuario</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$usuario->id?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label">Username</label>
        	<input type="text" name="username" value="<?=$usuario->username?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label">Password</label>
        	<input type="password" name="password" value="<?=$usuario->password?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label">Rol</label>
        	<select class="form-select" name="rol">
                <option value="0">Selecciona un Rol</option>
                <?php
                foreach ($roles as $rol){
                ?>
                    <option value="<?=$rol->id?>" <?=($usuario->rol == $rol->id)?"selected":""?>> <?=$rol->rol?></option>
                <?php 
                }
                ?>            
            </select>
        </td>
     </tr>
    <tr>
        <td>
        	<label class="control-label">Nombre del Usuario</label>  
        	<input type="text" name="nombre" value="<?=$usuario->nombre?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label">Apellidos</label>
        	<input type="text" name="apellidos" value="<?=$usuario->apellidos?>" class="form-control">
       	</td>
    </tr>
    
    <tr>
        <td>
        	<label class="control-label">Calle</label>
        	<input type="text" name="calle" value="<?=$usuario->calle?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Numero Ext.</label>
        	<input type="text" name="numero_ext" value="<?=$usuario->numero_ext?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Numero Int.</label>
        	<input type="text" name="numero_int" value="<?=$usuario->numero_int?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Ciudad</label>
        	<input type="text" name="ciudad" value="<?=$usuario->ciudad?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Estado</label>
        	<select class="form-select" name="estado">
                <option value="0">Selecciona un Estado</option>
                <?php
                foreach ($estados as $estado){
                ?>
                    <option value="<?=$estado->id?>" <?=($usuario->estado == $estado->id)?"selected":""?>> <?=$estado->estado?></option>
                <?php 
                }
                ?>            
            </select>
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Codigo Postal</label>
        	<input type="text" name="cp" value="<?=$usuario->cp?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Correo</label>
        	<input type="text" name="correo" value="<?=$usuario->correo?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Telefono 1</label>
        	<input type="text" name="telefono1" value="<?=$usuario->telefono1?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label">Telefono 2</label>
        	<input type="text" name="telefono2" value="<?=$usuario->telefono2?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
			<div class="form-group">
    			<button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Guardar</button>
			</div>
        </td>
    </tr>
  </table>
    </form>
</div>
</body>
</html>