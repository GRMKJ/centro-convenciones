<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Evento extends Modelo
{
	public $id;
	public $id_organizador;
	public $estado;
	public $nombre;
	public $tipo;
	public $duracion;

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

	function recuperaRegistro($id)
	{
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->id_organizador = $dato->id_organizador;
			$this->estado = $dato->estado;
			$this->nombre = $dato->nombre;
			$this->tipo = $dato->tipo;
			$this->duracion = $dato->duracion;
		}
	}

	function insertaRegistro()
	{
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (id,id_organizador,estado,nombre,tipo,duracion) " .
			"values ( " .
			"$this->id," .
			"$this->id_organizador," .
			"$this->estado," .
			"'$this->nombre'," .
			"'$this->tipo'," .
			"'$this->duracion',";

		$errores = $this->validarDatos();

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

		$this->consulta =
			"update $this->tabla set " .
			"id_organizador = $this->id_organizador," .
			"estado = $this->estado," .
			"nombre = '$this->nombre'," .
			"tipo = '$this->tipo'," .
			"duracion = '$this->duracion'," .
			"where id = $this->id";

		$errores = $this->validarDatos();

		if (count($errores) == 0) {
			$this->ejecutaComandoIUD();
			return $errores;
		} else {
			return $errores;
		}
	}

	function eliminaRegistro($id)
	{
		$this->consulta =
			"delete from $this->tabla " .
			"where id = $id;";

		$this->ejecutaComandoIUD();
	}

	function traerDatos()
	{
		$this->id = $_POST['id'];
		$this->id_organizador = $_POST['id_organizador'];
		$this->estado = $_POST['estado'];
		$this->nombre = $_POST['nombre'];
		$this->tipo = $_POST['tipo'];
		$this->duracion = $_POST['duracion'];
	}

	function validarDatos()
	{
		$errores = array();
		if ($this->estado == 0) {
			$errores[] = 'Selecciona un estado';
		}
		if ($this->nombre == null) {
			$errores[] = 'El Nombre es obligatorio';
		}
		if ($this->duracion == null) {
			$errores[] = 'La duracion es obligatorio';
		}
		if ($this->tipo == null) {
			$errores[] = 'El tipo es obligatorio';
		}

		return $errores;

	}

}

?>