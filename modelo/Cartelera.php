<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Cartelera extends Modelo
{
	public $id;
	public $id_evento;
	public $id_sala;
	public $estado;
	public $inicio;
	public $fin;

	function __construct()
	{
		parent::__construct();
		$this->tabla = "cartelera";
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
			$this->id_evento = $dato->id_evento;
			$this->id_sala = $dato->id_sala;
			$this->estado = $dato->estado;
			$this->inicio = $dato->inicio;
			$this->fin = $dato->fin;
		}
	}

	function insertaRegistro()
	{
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (id,id_evento,id_sala,estado,inicio,fin) " .
			"values ( " .
			"$this->id," .
			"$this->id_evento," .
			"$this->id_sala," .
			"$this->estado," .
			"'$this->inicio'," .
			"'$this->fin',";

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
			"id_evento = $this->id_evento," .
			"id_sala = $this->id_sala," .
			"estado = $this->estado," .
			"inicio = '$this->inicio'," .
			"fin = '$this->fin'," .
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
		$this->id_evento = $_POST['id_evento'];
		$this->id_sala = $_POST['id_sala'];
		$this->estado = $_POST['estado'];
		$this->inicio = $_POST['inicio'];
		$this->fin = $_POST['fin'];
	}

	function validarDatos()
	{
		$errores = array();
		if ($this->inicio == null) {
			$errores[] = 'Es obligatorio la Hora de Inicio';
		}
		if ($this->fin == null) {
			$errores[] = 'Es obligatorio la Hora de Final';
		}
		if ($this->id_evento == null) {
			$errores[] = 'Es obligatorio el Evento a Publicar';
		}
		if ($this->id_sala == null) {
			$errores[] = 'Es obligatorio la Sala que se usará';
		}

		return $errores;

	}

}

?>