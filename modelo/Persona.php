<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Persona extends Modelo {
	public $id;
	public $nombre;
	public $a_paterno;
	public $a_materno;
	public $fecha_nac;
	public $telefono;

	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->nombre = $dato->nombre;
	 		$this->a_paterno = $dato->a_paterno;
	 		$this->a_materno = $dato->a_materno;
	 		$this->fecha_nac = $dato->fecha_nac;
	 		$this->telefono = $dato->telefono;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (id,nombre,a_paterno,a_materno,fecha_nac,telefono) ".
		"values ( " .
		"$this->id," .
		"'$this->nombre',".
		"'$this->a_paterno',".
		"'$this->a_materno',".
		"'$this->fecha_nac',".
		"'$this->telefono'";
		
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
		"nombre = '$this->nombre'," .
		"a_paterno = '$this->a_paterno',".
		"a_materno = '$this->a_materno',".
		"fecha_nac = '$this->fecha_nac',".
		"telefono = '$this->telefono'," .
		"where id = $this->id";

		$errores=$this->validarDatos();

		if (count($errores)==0){
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			return $errores;
		}
	}

	function eliminaRegistro($id) {
		$this->consulta = 
		"delete from $this->tabla ".
		"where id = $id;";

		$this->ejecutaComandoIUD();
	}

	function traerDatos(){
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->a_paterno = $_POST['a_paterno'];
		$this->a_materno = $_POST['a_materno'];
		$this->fecha_nac = $_POST['fecha_nac'];
		$this->telefono = $_POST['telefono'];
	}

	function validarDatos(){
		$errores = array();
		if ($this->a_paterno==null){
			$errores[]='El Nombre es Obligatorio';
		}
		if ($this->a_paterno==null){
			$errores[]='El Apellido Paterno es Obligatorio';
		}
		if (Pattern::phoneNumber($this->telefono)==null){
			$errores[]='El formato del Telefono es incorrecto';
		}
			
		return $errores;
		
	}

	}

?>