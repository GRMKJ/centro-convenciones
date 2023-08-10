<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Sala extends Modelo {
	public $id;
	public $estado;
	public $nombre;
	public $asientos;

	function __construct() {
		parent::__construct();
		$this->tabla = "sala";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->estado = $dato->estado;
	 		$this->nombre = $dato->nombre;
	 		$this->asientos = $dato->asientos;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (id,estado,nombre,asientos,fecha_nac,telefono) ".
		"values ( " .
		"$this->id," .
		"$this->estado,".
		"'$this->nombre',".
		"$this->asientos,";
		
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
		"estado = $this->estado," .
		"nombre = '$this->nombre',".
		"asientos = $this->asientos,".
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
		$this->estado = $_POST['estado'];
		$this->nombre = $_POST['nombre'];
		$this->asientos = $_POST['asientos'];
	}

	function validarDatos(){
		$errores = array();
		if ($this->estado==null){
			$errores[]='El estado es Obligatorio';
		}
		if ($this->nombre==null){
			$errores[]='El nombre de la sala es Obligatorio';
		}
		if ($this->asientos==null){
			$errores[]='La Cantidad de Asientos es Obligatorio';
		}
			
		return $errores;
		
	}

	}

?>