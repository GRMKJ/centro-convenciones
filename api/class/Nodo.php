<?php
class Nodo{
    private $valor;
    private $siguiente;

    public function setVal($valor){
        if($valor!=null)
            $this->valor = $valor;
    }

    public function getVal(){
       return $this->valor;
    }

    public function setSig($siguiente){
        if( is_a( $siguiente , 'Nodo' ) || $siguiente == null )
            $this->siguiente = $siguiente;
    }

    public function getSig(){
        return $this->siguiente;
    }
    
    public function __Construct($valor, $siguiente = null) {
        if ( $valor != null )
            $this->setVal( $valor );
        else
            throw new Exception('No se permite valor null'); 
        
        $this->siguiente = null;
        $this->setSig( $siguiente );
    }
} 
?>