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
		"last_insert_id(),".
		"$this->ESTADO,".
		"'$this->CORREO',".
		"'$this->USERNAME',".
		"'$this->PASSWRD',".
		"'$this->ROL');";

		echo $this->consulta;
		
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
		"ESTADO = $this->ESTADO,".
		"CORREO = '$this->CORREO',".
		"USERNAME = '$this->USERNAME',".
		"PASSWRD = '$this->PASSWRD'," .
		"ROL = '$this->ROL'".
		"where ID = $this->ID;";
		
		echo $this->consulta;

		$errores=$this->validarDatos();

		if (count($errores)==0){
			echo 'Consulta Exitosa';
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

	function validarDatos(){
		$errores = array();
		
		if ($this->ESTADO==null){
			$errores[]='El ESTADO es Obligatorio';
		}

		if ($this->USERNAME==null){
			$errores[]='El ESTADO es Obligatorio';
		}
		if ($this->ROL==null){
			$errores[]='El ESTADO es Obligatorio';
		}

		return $errores;
		
	}
	function login(){
		
		$this->USERNAME = $_POST['USERNAME'];
		$this->PASSWRD = $_POST['PASSWRD'];
	
		$this->consulta = "select ID, USERNAME, PASSWRD, ROL from $this->tabla where USERNAME = '$this->USERNAME' and PASSWRD = '$this->PASSWRD';";

		$dato = $this->encuentraUno();
		
		if ( isset($dato) ) {
            $this->ID = $dato->ID;
            $this->USERNAME = $dato->USERNAME;
            $this->PASSWRD = $dato->PASSWRD;
			$this->ROL = $dato->ROL;
		}
	}

	function procedUsuario(){
		$this->traerDatos();
		$this->consulta = "insert into persona (ID,NOMBRE,A_PATERNO,A_MATERNO,FECHA_NAC,TELEFONO) ".
		"values ( " .
		"null,"."'".$_POST['NOMBRE']."',"."'".$_POST['A_PATERNO']."',".
		"'".$_POST['A_MATERNO']."',"."'".$_POST['FECHA_NAC']."',"."'".$_POST['TELEFONO']."');
		insert into $this->tabla (ID,ID_PERSONA,ESTADO,CORREO,USERNAME,PASSWRD,ROL) ".
		"values ( " .
		"$this->ID," .
		"last_insert_id(),".
		"$this->ESTADO,".
		"'$this->CORREO',".
		"'$this->USERNAME',".
		"'$this->PASSWRD',".
		"'$this->ROL');";
		$errores=$this->validarDatos();

		$this->ejecutaComandoIUD();
		return $errores ;
	}

	}

?>