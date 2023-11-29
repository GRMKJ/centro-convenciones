<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Evento extends Modelo
{
	public $ID;
	public $ID_ORGANIZADOR;
	public $NOMBRE;
	public $TIPO;
	public $DURACION;
	public $FOTO;

	function __construct()
	{
		parent::__construct();
		$this->tabla = "evento";
	}

	function lista()
	{
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID)
	{
		$this->consulta = "select * from $this->tabla where ID = $ID";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->ID_ORGANIZADOR = $dato->ID_ORGANIZADOR;
			$this->NOMBRE = $dato->NOMBRE;
			$this->TIPO = $dato->TIPO;
			$this->DURACION = $dato->DURACION;
			$this->FOTO = $dato->FOTO;
		}
	}

	function insertaRegistro(){
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (ID,ID_ORGANIZADOR,NOMBRE,TIPO,DURACION,FOTO) " .
			"values ( " .
			"$this->ID," .
			"$this->ID_ORGANIZADOR," .
			"'$this->NOMBRE'," .
			"'$this->TIPO'," .
			"'$this->DURACION',".
			"'$this->FOTO');";

		error_log(print_r($this->consulta, TRUE)); 

		$errores = $this->valIDarDatos();

		if (count($errores) == 0) {
			$this->ejecutaComandoIUD();
			return $errores;
		} else {
			return $errores;
		}

	}

	function actualizaRegistro()
	{
		$this->traerDatos();

		if($_FILES["FOTO"]["error"]==0){
			$this->consulta =
			"update $this->tabla set " .
			"ID_ORGANIZADOR = $this->ID_ORGANIZADOR," .
			"NOMBRE = '$this->NOMBRE'," .
			"TIPO = '$this->TIPO'," .
			"DURACION = '$this->DURACION'," .
			"FOTO = '$this->FOTO'" .
			"where ID = $this->ID;";
		}
		else{
			$this->consulta =
			"update $this->tabla set " .
			"ID_ORGANIZADOR = $this->ID_ORGANIZADOR," .
			"NOMBRE = '$this->NOMBRE'," .
			"TIPO = '$this->TIPO'," .
			"DURACION = '$this->DURACION'" .
			"where ID = $this->ID;";
		}

		$errores = $this->valIDarDatos();

		if (count($errores) == 0) {
			$this->ejecutaComandoIUD();
			return $errores;
		} else {
			return $errores;
		}
	}

	function eliminaRegistro($ID)
	{
		$this->consulta =
			"delete from $this->tabla " .
			"where ID = $ID;";

		$this->ejecutaComandoIUD();
	}

	function traerDatos(){
		$this->ID = $_POST['ID'];
		$this->ID_ORGANIZADOR = $_POST['ID_ORGANIZADOR'];
		$this->NOMBRE = $_POST['NOMBRE'];
		$this->TIPO = $_POST['TIPO'];
		$this->DURACION = $_POST['DURACION'];
		$this->FOTO = $this->subirFoto();
	}

	function valIDarDatos()
	{
		$errores = array();
		if ($this->NOMBRE == null) {
			$errores[] = 'El NOMBRE es obligatorio';
		}
		if ($this->DURACION == null) {
			$errores[] = 'La DURACION es obligatorio';
		}
		if ($this->TIPO == null) {
			$errores[] = 'El TIPO es obligatorio';
		}

		return $errores;

	}

	function subirFoto(){
		$target_dir = "/home/u544793699/public_html/ccsxxitest/imagenes/posters/";
		$url_base = "https://minitechsolutions.shop/ccsxxitest/imagenes/posters/";
		$target_file = $target_dir . basename($_FILES["FOTO"]["name"]);
		$bdfile = basename($_FILES["FOTO"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["FOTO"])) {
			$check = getimagesize($_FILES["FOTO"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = "null";
			} 
			else {
				$uploadOk = "null";
				return "File is not an image.";
			}
		}
		
		// Check file size
		if ($_FILES["FOTO"]["size"] > 5000000) {
			return $uploadOk = "null";
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$uploadOk = "null";
			return $uploadOk;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			
		// if everything is ok, try to upload file
		} 
		else {
			if (move_uploaded_file($_FILES["FOTO"]["tmp_name"], $target_file)) {
				$bdurl = $url_base.$bdfile;
				return $bdurl;
			} 
			else {
				$bdurl = $url_base.$bdfile;
				return $bdurl;
			}
  		}

	}

}

?>