<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Sala extends Modelo {
	public $ID;
	public $ESTADO;
	public $NOMBRE;
	public $ASIENTOS;

	function __construct() {
		parent::__construct();
		$this->tabla = "sala";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID) {
		$this->consulta = "select * from $this->tabla where ID = $ID";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->ESTADO = $dato->ESTADO;
	 		$this->NOMBRE = $dato->NOMBRE;
	 		$this->ASIENTOS = $dato->ASIENTOS;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (ID,ESTADO,NOMBRE,ASIENTOS) ".
		"values ( " .
		"$this->ID," .
		"$this->ESTADO,".
		"'$this->NOMBRE',".
		"$this->ASIENTOS)";
		
		$errores=$this->validarDatos();

		if (count($errores)==0){
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			return $errores;
		}

	}

	function actualizaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"update $this->tabla set " .
		"ESTADO = $this->ESTADO," .
		"NOMBRE = '$this->NOMBRE',".
		"ASIENTOS = $this->ASIENTOS ".
		"where ID = $this->ID";

		$errores=$this->validarDatos();

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
		$this->ESTADO = $_POST['ESTADO'];
		$this->NOMBRE = $_POST['NOMBRE'];
		$this->ASIENTOS = $_POST['ASIENTOS'];
	}

	function validarDatos(){

		$errores = array();
		
		if ($this->ESTADO==null){
			$errores[]='El ESTADO es Obligatorio';
		}
		if ($this->NOMBRE==null){
			$errores[]='El NOMBRE de la sala es Obligatorio';
		}
			
		return $errores;
		
	}

	}

?>