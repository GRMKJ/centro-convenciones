<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Organizador extends Modelo
{
	public $id;
	public $id_persona;
	public $estado;
	public $razonsoc;
	public $rfc;
	public $direccion;

	function __construct()
	{
		parent::__construct();
		$this->tabla = "organizador";
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
			$this->id_persona = $dato->id_persona;
			$this->estado = $dato->estado;
			$this->razonsoc = $dato->razonsoc;
			$this->rfc = $dato->rfc;
			$this->direccion = $dato->direccion;
		}
	}

	function insertaRegistro()
	{
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (id,id_persona,estado,razonsoc,rfc,direccion,rol) " .
			"values ( " .
			"$this->id," .
			"last_insert_id()," .
			"$this->estado," .
			"'$this->razonsoc'," .
			"'$this->rfc'," .
			"'$this->direccion',";

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
			"id_persona = $this->id_persona," .
			"estado = $this->estado," .
			"razonsoc = '$this->razonsoc'," .
			"rfc = '$this->rfc'," .
			"direccion = '$this->direccion'," .
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
		$this->id_persona = $_POST['id_persona'];
		$this->estado = $_POST['estado'];
		$this->razonsoc = $_POST['razonsoc'];
		$this->rfc = $_POST['rfc'];
		$this->direccion = $_POST['direccion'];
	}

	function validarDatos()
	{
		$errores = array();
		if ($this->estado == 0) {
			$errores[] = 'Selecciona un estado';
		}
		if (Pattern::esRfc($this->rfc) == null) {
			$errores[] = 'El formato del RFC es incorrecto';
		}

		return $errores;

	}

}

?>