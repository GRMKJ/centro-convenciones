<?php 
require_once ("conexion.php");
class Usuario {
    public $ID;
	public $ID_PERSONA;
	public $ESTADO;
	public $CORREO;
	public $USERNAME;
	public $ROL;

    public function __construct($p1,$p2,$p3,$p4,$p5,$p6){
        $this->ID = $p1;
        $this->ID_PERSONA = $p2;
        $this->ESTADO = $p3;
        $this->CORREO = $p4;
        $this->USERNAME = $p5;
        $this->ROL = $p6;
    }
}