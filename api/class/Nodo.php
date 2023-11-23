<?php
class Nodo{
    private $valor;
    private $siguiente;
/**
* Establece el valor del nodo.
* @param mixed $valor El valor a establecer.
*/

public function setVal($valor){
    if($valor!=null)
        $this->valor = $valor;
}
/**
* Obtiene el valor del nodo.
* @return mixed El valor del nodo.
*/
public function getVal(){
   return $this->valor;
}

/**
* Establece la referencia al siguiente nodo.
* @param mixed $siguiente El siguiente nodo.
*/
public function setSig($siguiente){
    if( is_a( $siguiente , 'Nodo' ) || $siguiente == null )
        $this->siguiente = $siguiente;
}

/**
* Obtiene la referencia al siguiente nodo.
* @return mixed El siguiente nodo.
*/
public function getSig(){
    return $this->siguiente;
}

/**
* Constructor de la clase.
* @param mixed $valor El valor del nodo.
* @param mixed $siguiente El siguiente nodo.
*/
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