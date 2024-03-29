<?php
require_once('Modelo.php');
require_once('Pattern.php');

class Organizador extends Modelo
{
	public $ID;
	public $ID_PERSONA;
	public $ESTADO;
	public $RAZONSOC;
	public $DIRECCION;

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

	function recuperaRegistro($ID)
	{
		$this->consulta = "select * from $this->tabla where ID = $ID";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->ID_PERSONA = $dato->ID_PERSONA;
			$this->ESTADO = $dato->ESTADO;
			$this->RAZONSOC = $dato->RAZONSOC;
			$this->DIRECCION = $dato->DIRECCION;
		}
	}

	function insertaRegistro()
	{
		$this->traerDatos();

		$this->consulta =
			"insert into $this->tabla (ID,ID_PERSONA,ESTADO,RAZONSOC,RFC,DIRECCION) " .
			"values ( " .
			"$this->ID," .
			"last_insert_ID()," .
			"$this->ESTADO," .
			"'$this->RAZONSOC'," .
			"'$this->DIRECCION')";

			echo $this->consulta;

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
			"ESTADO = $this->ESTADO, " .
			"RAZONSOC = '$this->RAZONSOC', " .
			"DIRECCION = '$this->DIRECCION' " .
			"where ID = $this->ID";
		
		echo $this->consulta;
		
		$errores = $this->validarDatos();

		if (count($errores) == 0) {
			echo 'Consulta Exitosa';
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
		$this->ID_PERSONA = $_POST['ID_PERSONA'];
		$this->ESTADO = $_POST['ESTADO'];
		$this->RAZONSOC = $_POST['RAZONSOC'];
		$this->DIRECCION = $_POST['DIRECCION'];
	}

	function validarDatos()
	{
		$errores = array();

		if ($this->ESTADO == 0) {
			$errores[] = 'Es obligatorio la Fecha de Inicio';
		}
		if ($this->RAZONSOC == null) {
			$errores[] = 'Es obligatorio la Fecha de Final';
		}
		if ($this->DIRECCION == null) {
			$errores[] = 'Es obligatorio el Evento a Publicar';
		}

		return $errores;

	}

	function procedorganizador(){
		$this->traerDatos();

		$this->consulta = "insert into persona (ID,NOMBRE,A_PATERNO,A_MATERNO,FECHA_NAC,TELEFONO) ".
		"values ( null,"."'".$_POST['NOMBRE']."',"."'".$_POST['A_PATERNO']."',".
		"'".$_POST['A_MATERNO']."',"."'".$_POST['FECHA_NAC']."',"."'".$_POST['TELEFONO']."');
		insert into $this->tabla (ID,ID_PERSONA,ESTADO,RAZONSOC,DIRECCION) " .
			"values ( " .
			"$this->ID," .
			"last_insert_ID()," .
			"$this->ESTADO," .
			"'$this->RAZONSOC'," .
			"'$this->DIRECCION');";

		echo $this->consulta;

		$errores=$this->validarDatos();

		if (count($errores) == 0) {
			echo 'Consulta Exitosa';
			$this->ejecutaComandoIUD();
			return $errores;
		} 
		else {
			return $errores;
		}

	}
}

?>