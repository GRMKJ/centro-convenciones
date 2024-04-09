<?php 
require_once ("conexion.php");
class Persona {
    public $ID;
	public $NOMBRE;
	public $A_PATERNO;
	public $A_MATERNO;
	public $FECHA_NAC;
	public $TELEFONO;

    public function __construct($p1,$p2,$p3,$p4,$p5,$p6){
        $this->ID = $p1;
        $this->NOMBRE = $p2;
        $this->A_PATERNO = $p3;
        $this->A_MATERNO = $p4;
        $this->FECHA_NAC = $p5;
        $this->TELEFONO = $p6;
    }
}