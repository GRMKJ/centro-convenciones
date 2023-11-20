<?php 
require_once ("conexion.php");
class Usuario {
    public $ID;
	public $ID_EVENTO;
	public $ID_SALA;
	public $ESTADO;
	public $INICIO;
	public $FIN;

    public function __construct($p1,$p2,$p3,$p4,$p5,$p6){
        $this->ID = $p1;
        $this->ID_EVENTO = $p2;
        $this->ID_SALA = $p3;
        $this->ESTADO = $p4;
        $this->INICIO = $p5;
        $this->FIN = $p6;
    }

    
}