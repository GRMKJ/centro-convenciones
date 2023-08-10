<?php 
require_once('../logica/Usuario.php');
require_once('../logica/Estado.php');
require_once('../logica/Rol.php'); 

$usuario = new Usuario();
$estado = new Estado();
$placeholder = new Usuario();
$estados = $estado->lista();
$rol = new Rol();
$roles = $rol->lista();
?>

<html>
<head>
    <title>PVAMP - Nuevo Usuario</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container py-2 w-50">
<?php 
if (isset($_POST['id'])) {
    $placeholder->traerDatos();
    $error = $usuario->insertaRegistro();
    if (count($error)==0){
        header("Location: index.php");
    }
    else{
        foreach ($error as $errores){?>
        <div class="alert alert-danger" role="alert">
            <?=$errores?>
        </div>
        
    <?php
        }

    }
}
?>
</div>
<div class="container py-2 w-50">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Usuarios</a>
        <h2 class="mt-4">Agregar un usuario</h2>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="id" value="0">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Username</label>
        	<input type="text" name="username" placeholder="Username" value="<?=$placeholder->username?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Password</label>
        	<input type="password" name="password" placeholder="Password" value="<?=$placeholder->password?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Rol</label>
        	<select class="form-select" name="rol">
                <option value="0">Selecciona un Rol</option>
                <?php
                foreach ($roles as $rol){
                ?>
                    <option value="<?=$rol->id?>" <?=($placeholder->rol == $rol->id)?"selected":""?>> <?=$rol->rol?></option>
                <?php 
                }
                ?>            
            </select>
        </td>
     </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>  
        	<input type="text" name="nombre" placeholder="Nombre del Usuario" value="<?=$placeholder->nombre?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellidos</label>
        	<input type="text" name="apellidos" placeholder="Apellido Paterno del usuario" value="<?=$placeholder->apellidos?>" class="form-control">
       	</td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Calle</label>
        	<input type="text" name="calle" placeholder="Calle del Domicilio" value="<?=$placeholder->calle?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Numero Ext.</label>
        	<input type="text" name="numero_ext" placeholder="Numero Exterior del Domicilio" value="<?=$placeholder->numero_ext?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Numero Int.</label>
        	<input type="text" name="numero_int" placeholder="Numero Interior del Domicilio" value="<?=$placeholder->numero_int?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Ciudad</label>
        	<input type="text" name="ciudad" placeholder="Ciudad del Domicilio" value="<?=$placeholder->ciudad?>" class="form-control">
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
                    <option value="<?=$estado->id?>" <?=($placeholder->estado == $estado->id)?"selected":""?>> <?=$estado->estado?></option>
                <?php 
                }
                ?>            
            </select>
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">C.P.</label>
        	<input type="text" name="cp" placeholder="Codigo Postal del Domicilio" value="<?=$placeholder->cp?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Correo</label>
        	<input type="text" name="correo" placeholder="Correo del Usuario" value="<?=$placeholder->correo?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Telefono 1</label>
        	<input type="text" name="telefono1" placeholder="Telefono 1 del Usuario" value="<?=$placeholder->telefono1?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Telefono 2</label>
        	<input type="text" name="telefono2" placeholder="Telefono 2 del Usuario" value="<?=$placeholder->telefono2?>" class="form-control">
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
</body>
</html>