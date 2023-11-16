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

	function insertaRegistro()
	{
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

		if($_FILES['FOTO']['error']!=4){
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

	function traerDatos()
	{
		$this->ID = $_POST['ID'];
		$this->ID_ORGANIZADOR = $_POST['ID_ORGANIZADOR'];
		$this->NOMBRE = $_POST['NOMBRE'];
		$this->TIPO = $_POST['TIPO'];
		$this->DURACION = $_POST['DURACION'];
		if($_FILES['FOTO']['error']!=4){
			$this->FOTO = addslashes(file_get_contents($_FILES['FOTO']['tmp_name']));
		}
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

}

?>