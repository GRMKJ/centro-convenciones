<?php 
require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');
require_once('Security.php');

$usuario = new Usuario();
$persona = new Persona();



?>
<html>
<head>
  <title>CC Siglo XXI - Modificar Usuarios</title>
  <link rel="icon" type="image/x-icon" href="..\..\..\imagenes\CULTURA1.png">
  <meta name="viewport" content="width=device-width,initial-scale=1">
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
    <?php
    if (isset($_POST['ID']) && isset($_POST['ID_PERSONA'])) {
        
        $error = $persona->actualizaRegistro();
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
            $usuario->recuperaRegistro($usuario->ID);
            $persona->recuperaRegistro($usuario->ID_PERSONA);
            }
        }
    }
    else{
        $usuario->ID = $_GET['id'];
        $usuario->recuperaRegistro($usuario->ID);
        $persona->ID = $_GET['pid'];
        $persona->recuperaRegistro($persona->ID);
    }
    ?>
<div class="container py-2 w-50">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Usuarios</a>
        <h2 class="mt-4 text-white">Modificar un usuario</h2>
    </div>
    <form name="frmInsProd" method="post" action="modificar.php">
    <input type="hidden" name="ID" value="<?=$usuario->ID?>">
    <input type="hidden" name="ID_PERSONA" value="<?=$usuario->ID_PERSONA?>">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Username</label>
        	<input type="text" name="USERNAME" usuario="Username" value="<?=$usuario->USERNAME?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Password</label>
        	<input type="password" name="PASSWRD" usuario="Password" placeholder="Inserte nueva Contraseña" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Rol</label>
        	<select class="form-select" name="ROL">
                <option value="0" <?=($usuario->ROL == 0)?"selected":""?>>Selecciona un Rol</option>
                <option value="1" <?=($usuario->ROL == 1)?"selected":""?>>Usuario</option>
                <option value="5" <?=($usuario->ROL == 5)?"selected":""?>>Administrador</option>          
            </select>
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>  
        	<input type="text" name="NOMBRE" usuario="Nombre" value="<?=$persona->NOMBRE?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Paterno</label>  
        	<input type="text" name="A_PATERNO" usuario="Apellido Paterno" value="<?=$persona->A_PATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Materno</label>  
        	<input type="text" name="A_MATERNO" usuario="Apellido Materno" value="<?=$persona->A_MATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Fecha de Nacimiento</label>  
        	<input type="date" name="FECHA_NAC"  value="<?=$persona->FECHA_NAC?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Telefono</label>  
        	<input type="text" name="TELEFONO" usuario="Telefono" value="<?=$persona->TELEFONO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Correo</label>  
        	<input type="email" name="CORREO" usuario="Correo Electronico" value="<?=$usuario->CORREO?>" class="form-control">
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