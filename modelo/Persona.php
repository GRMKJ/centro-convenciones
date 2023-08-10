<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Persona extends Modelo {
	public $ID;
	public $NOMBRE;
	public $A_PATERNO;
	public $A_MATERNO;
	public $FECHA_NAC;
	public $TELEFONO;

	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID) {
		$this->consulta = "select * from $this->tabla where ID = $ID";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->NOMBRE = $dato->NOMBRE;
	 		$this->A_PATERNO = $dato->A_PATERNO;
	 		$this->A_MATERNO = $dato->A_MATERNO;
	 		$this->FECHA_NAC = $dato->FECHA_NAC;
	 		$this->TELEFONO = $dato->TELEFONO;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (ID,NOMBRE,A_PATERNO,A_MATERNO,FECHA_NAC,TELEFONO) ".
		"values ( " .
		"$this->ID," .
		"'$this->NOMBRE',".
		"'$this->A_PATERNO',".
		"'$this->A_MATERNO',".
		"'$this->FECHA_NAC',".
		"'$this->TELEFONO');";
		
		$errores=$this->valIDarDatos();

		if (count($errores)==0){
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			echo 'Persona No Insertada';
			return $errores;

		}

	}

	function actualizaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"update $this->tabla set " .
		"NOMBRE = '$this->NOMBRE'," .
		"A_PATERNO = '$this->A_PATERNO',".
		"A_MATERNO = '$this->A_MATERNO',".
		"FECHA_NAC = '$this->FECHA_NAC',".
		"TELEFONO = '$this->TELEFONO'" .
		"where ID = $this->ID;";

		$errores=$this->valIDarDatos();

		if (count($errores)==0){
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			return $errores;
		}
	}

	function eliminaRegistro($ID) {
		$this->consulta = 
		"delete from $this->tabla ".
		"where ID = $ID;";

		$this->ejecutaComandoIUD();
	}

	function traerDatos(){
		$this->ID = $_POST['ID'];
		$this->NOMBRE = $_POST['NOMBRE'];
		$this->A_PATERNO = $_POST['A_PATERNO'];
		$this->A_MATERNO = $_POST['A_MATERNO'];
		$this->FECHA_NAC = $_POST['FECHA_NAC'];
		$this->TELEFONO = $_POST['TELEFONO'];
	}

	function valIDarDatos(){
		$errores = array();
		if ($this->NOMBRE==null){
			$errores[]='El NOMBRE es Obligatorio';
		}
		if ($this->A_PATERNO==null){
			$errores[]='El ApellIdo Paterno es Obligatorio';
		}
		return $errores;
		
	}

	}

?>