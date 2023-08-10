<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Usuario extends Modelo {
	public $id;
	public $id_persona;
	public $estado;
	public $correo;
	public $username;
	public $psswrd;
	public $rol;

	function __construct() {
		parent::__construct();
		$this->tabla = "usuario";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->id_persona = $dato->id_persona;
	 		$this->estado = $dato->estado;
	 		$this->correo = $dato->correo;
	 		$this->username = $dato->username;
	 		$this->psswrd = $dato->psswrd;
	 		$this->rol = $dato->rol;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (id,id_persona,estado,correo,username,psswrd,rol) ".
		"values ( " .
		"$this->id," .
		"last_insert_id(),".
		"$this->estado,".
		"'$this->correo',".
		"'$this->username',".
		"'$this->psswrd',".
		"'$this->rol',";
		
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
		"id_persona = $this->id_persona," .
		"estado = $this->estado,".
		"correo = '$this->correo',".
		"username = '$this->username',".
		"psswrd = '$this->psswrd'," .
		"rol = '$this->rol',".
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
		$this->id_persona = $_POST['id_persona'];
		$this->estado = $_POST['estado'];
		$this->correo = $_POST['correo'];
		$this->username = $_POST['username'];
		$this->psswrd = $_POST['psswrd'];
		$this->rol = $_POST['rol'];
	}

	function validarDatos(){
		$errores = array();
		if ($this->estado==0){
			$errores[]='Selecciona un estado';
		}
		if (Pattern::email($this->correo)==null){
			$errores[]='El formato del correo es incorrecto';
		}
			
		return $errores;
		
	}

	}

?>