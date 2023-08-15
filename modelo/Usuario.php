<?php 
require_once('Modelo.php');
require_once('Pattern.php');

class Usuario extends Modelo {
	public $ID;
	public $ID_PERSONA;
	public $ESTADO;
	public $CORREO;
	public $USERNAME;
	public $PASSWRD;
	public $ROL;

	function __construct() {
		parent::__construct();
		$this->tabla = "usuario";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID) {
		$this->consulta = "select * from $this->tabla where ID = $ID";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->ID_PERSONA = $dato->ID_PERSONA;
	 		$this->ESTADO = $dato->ESTADO;
	 		$this->CORREO = $dato->CORREO;
	 		$this->USERNAME = $dato->USERNAME;
	 		$this->PASSWRD = $dato->PASSWRD;
	 		$this->ROL = $dato->ROL;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (ID,ID_PERSONA,ESTADO,CORREO,USERNAME,PASSWRD,ROL) ".
		"values ( " .
		"$this->ID," .
		"$this->ID_PERSONA,".
		"$this->ESTADO,".
		"'$this->CORREO',".
		"'$this->USERNAME',".
		"'$this->PASSWRD',".
		"'$this->ROL');";
		
		$errores=$this->valIDarDatos();

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
		"ESTADO = $this->ESTADO,".
		"CORREO = '$this->CORREO',".
		"USERNAME = '$this->USERNAME',".
		"PASSWRD = '$this->PASSWRD'," .
		"ROL = '$this->ROL'".
		"where ID = $this->ID";

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
		$this->ID_PERSONA = $_POST['ID_PERSONA'];
		$this->ESTADO = $_POST['ESTADO'];
		$this->CORREO = $_POST['CORREO'];
		$this->USERNAME = $_POST['USERNAME'];
		$this->PASSWRD = md5($_POST['PASSWRD']);
		$this->ROL = $_POST['ROL'];
	}

	function valIDarDatos(){
		$errores = array();
		if ($this->ESTADO==0){
			$errores[]='Selecciona un ESTADO';
		}
		if (Pattern::email($this->CORREO)==null){
			$errores[]='El formato del CORREO es incorrecto';
		}
			
		return $errores;
		
	}
	function login(){
		
		$this->USERNAME = $_POST['USERNAME'];
	
		$this->consulta = "select * from $this->tabla where USERNAME = '$this->USERNAME'";

		$dato = $this->encuentraUno();
		
		if ( isset($dato) ) {
            $this->ID = $dato->ID;
            $this->USERNAME = $dato->USERNAME;
            $this->PASSWRD = $dato->PASSWRD;
			$this->ROL = $dato->ROL;
		}
	}

	function procedUsuario(){
		$this->consulta = "CALL registrarUsuario('".$_POST['NOMBRE']."', '".$_POST['A_PATERNO']."', '".$_POST['A_MATERNO']."', '".$_POST['FECHA_NAC']."', '".$_POST['TELEFONO']."', '".$_POST['CORREO']."', '".$_POST['PASSWRD']."', '".$_POST['USERNAME']."', ".$_POST['ROL'].");";
		$errores=$this->valIDarDatos();

		$this->ejecutaComandoIUD();
		return $errores ;
	}

	}

?>