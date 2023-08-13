<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Cartelera extends Modelo
{
	public $ID;
	public $ID_EVENTO;
	public $ID_SALA;
	public $ESTADO;
	public $INICIO;
	public $FIN;

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

	function recuperaRegistro($ID)
	{
		$this->consulta = "select * from $this->tabla where ID = $ID";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->ID_EVENTO = $dato->ID_EVENTO;
			$this->ID_SALA = $dato->ID_SALA;
			$this->ESTADO = $dato->ESTADO;
			$this->INICIO = $dato->INICIO;
			$this->FIN = $dato->FIN;
		}
	}

	function insertaRegistro()
	{
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (ID,ID_EVENTO,ID_SALA,ESTADO,INICIO,FIN) " .
			"values ( " .
			"$this->ID," .
			"$this->ID_EVENTO," .
			"$this->ID_SALA," .
			"$this->ESTADO," .
			"'$this->INICIO'," .
			"'$this->FIN',";

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

		$this->consulta =
			"update $this->tabla set " .
			"ID_EVENTO = $this->ID_EVENTO," .
			"ID_SALA = $this->ID_SALA," .
			"ESTADO = $this->ESTADO," .
			"INICIO = '$this->INICIO'," .
			"FIN = '$this->FIN'," .
			"where ID = $this->ID";

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
		$this->ID_EVENTO = $_POST['ID_EVENTO'];
		$this->ID_SALA = $_POST['ID_SALA'];
		$this->ESTADO = $_POST['ESTADO'];
		$this->INICIO = $_POST['INICIO'];
		$this->FIN = $_POST['FIN'];
	}

	function valIDarDatos()
	{
		$errores = array();
		if ($this->INICIO == null) {
			$errores[] = 'Es obligatorio la Hora de INICIO';
		}
		if ($this->FIN == null) {
			$errores[] = 'Es obligatorio la Hora de FINal';
		}
		if ($this->ID_EVENTO == null) {
			$errores[] = 'Es obligatorio el Evento a Publicar';
		}
		if ($this->ID_SALA == null) {
			$errores[] = 'Es obligatorio la Sala que se usará';
		}

		return $errores;

	}

}

?>