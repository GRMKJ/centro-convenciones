<?php 
ob_start();
require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');
require_once('Security.php');

$usuario = new Usuario();
$persona = new Persona();


if ($_GET['id']) {
    $usuario->id = $_GET['id'];
    $usuario->recuperaRegistro($usuario->id);
    $persona->recuperaRegistro($usuario->ID_PERSONA);
}
?>
<html>
<head>
  <title>CC Siglo XXI - Ver Usuarios</title>
  <link rel="icon" type="image/x-icon" href="../../../imagenes/CULTURA1.png">
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

<div class="container py-2 w-50 justify-content-center">
    <div class="card">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        <h2 class="mt-4 text-black ms-5">Detalles del usuario</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$usuario->id?>">
  	<table class="table">
      <tr>
        <td>
        	<label class="control-label fw-bold">Username</label>
        </td>
        <td>
            <span><?=$usuario->USERNAME?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Rol</label>
        </td>
        <td>
            <span title="<?=$usuario->rol?>"><?=($usuario->ROL == 1)?"Cliente":""?><?=($usuario->ROL == 5)?"Administrativo":""?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Nombre</label>  
        </td>
        <td>
            <span><?=$persona->NOMBRE?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">Apellido Paterno</label>
       	</td>
        <td>
            <span><?=$persona->A_PATERNO?></span>
        </td>
    </tr>
    
    <tr>
        <td>
        	<label class="control-label fw-bold">Apellido Materno</label>
        </td>
        <td>
            <span><?=$persona->A_MATERNO?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label fw-bold">Fecha de Nacimiento</label>
        </td>
        <td>
            <span><?=$persona->FECHA_NAC?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label fw-bold">Telefono</label>
        </td>
        <td>
            <span><?=$persona->TELEFONO?></span>
        </td>        
     </tr>
     <tr>
        <td>
        	<label class="control-label fw-bold">Correo</label>
        </td>
        <td>
            <span><?=$usuario->CORREO?></span>
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