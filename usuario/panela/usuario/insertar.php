<?php 
ob_start();
require_once('../../../modelo/Usuario.php');
require_once('../../../modelo/Persona.php');
require_once('Security.php');

$usuario = new Usuario();
$placeholder = new Usuario();
$persona = new Persona();
$placeholder2 = new Persona();
?>

<html>
<head>
    <title>CC Siglo XXI - Agregar Usuarios</title>
    <link rel="icon" type="image/x-icon" href="../../../imagenes/CULTURA1.png">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../../../css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(../../../imagenes/teatro.jpg);background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
<div class="container py-2 w-50">
<?php 
if (isset($_POST['ID'])) {
    $placeholder->traerDatos();
    $error = $usuario->procedUsuario();
    if (count($error)==0){
        header("Location: index.php");
    }
    else{?>
        <div class="alert alert-danger" role="alert">
            <?='algo salio mal'?>
        </div>
        
    <?php
        }

    }
?>
</div>
<div class="container py-2 w-50 justify-content-center">
    <div class="card">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Usuarios</a>
        <h2 class="mt-4 text-black ms-5">Agregar un usuario</h2>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="ID" value="null">
    <input type="hidden" name="ID_PERSONA" value="LAST_INSERT_ID()">
  	<table class="table mt-4">
    <tr>
        <td>
        	<label class="control-label ms-2">Username</label>
        	<input type="text" name="USERNAME" placeholder="Username" value="<?=$placeholder->USERNAME?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Password</label>
        	<input type="password" name="PASSWRD" id="psw" pattern="(?=.*/d)(?=.*[a-z])(?=.*[A-Z]).{8,})" placeholder="Password" value="<?=$placeholder->PASSWRD?>" title="Debe contener los siguientes requisitos" required class="form-control">
            <div id="message">
                <h5>La Contraseña debe</h5>
                <p id="letter" class="invalid">Una letra <b>minúscula</b> </p>
                <p id="capital" class="invalid">Una letra <b>mayúscula</b> </p>
                <p id="number" class="invalid">Un <b>número</b></p>
                <p id="length" class="invalid">Mínimo <b>8 caracteres</b></p>
            </div>
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Rol</label>
        	<select class="form-select" name="ROL">
                <option value="0">Selecciona un Rol</option>
                <option value="1">Usuario</option>
                <option value="5">Administrador</option>          
            </select>
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">Nombre</label>  
        	<input type="text" name="NOMBRE" placeholder="Nombre" value="<?=$placeholder2->NOMBRE?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Paterno</label>  
        	<input type="text" name="A_PATERNO" placeholder="Apellido Paterno" value="<?=$placeholder2->A_PATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Apellido Materno</label>  
        	<input type="text" name="A_MATERNO" placeholder="Apellido Materno" value="<?=$placeholder2->A_MATERNO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Fecha de Nacimiento</label>  
        	<input type="date" name="FECHA_NAC"  value="<?=$placeholder2->FECHA_NAC?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Telefono</label>  
        	<input type="text" name="TELEFONO" placeholder="Telefono" value="<?=$placeholder2->TELEFONO?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">Correo</label>  
        	<input type="email" name="CORREO" placeholder="Correo Electronico" value="<?=$placeholder->CORREO?>" class="form-control">
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
</div>
</body>
<script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
    </script>
</html>