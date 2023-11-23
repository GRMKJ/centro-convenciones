<?php
include "Nodo.php";

class Lista
{
    private $root;
    private $length;

    /**
* Constructor de la clase.
* @param mixed $valor Valor opcional para el nodo inicial de la lista.
*/
public function __Construct($valor=null){   
    if ($valor != null) {   
        $this->root = new Nodo($valor);   
        $this->length = 1;
    } else {                   
        $this->root  = null;               
        $this->length=0;                  
    }
}

    public function getLength(){
        return $this->length;
    }

    public function agregarInicio($valor){
        $this->root == null ? $this->root = new Nodo($valor) : $this->root = new Nodo($valor, $this->root);
        $this->length++;
    }

    /**
* Agrega un nodo con un valor en un índice específico de la lista.
* Si la lista está vacía, agrega el nodo como primer elemento.
* @param mixed $valor Valor del nuevo nodo.
* @param int $indice Índice en el que se va a agregar el nodo.
*/
public function agregarIndice($valor, $indice){
    if ($this->root == null)
    {
        $this->agregarInicio($valor);
    }
    else
    {
        $nodoEncontrado = $this->buscarIndice($indice-1);
        if ( $nodoEncontrado != null ){

            $nodoEncontrado->setSig( new Nodo($valor, $nodoEncontrado->getSig()) );
            $this->length++;
        }
    }
}

    /**
* Agrega un nodo con un valor al final de la lista.
* Si la lista está vacía, agrega el nodo como primer elemento.
* @param mixed $valor Valor del nuevo nodo.
*/
public function agregarUltimo($valor){
    $nodoEncontrado = $this->buscarIndice($this->length - 1);
    if ( $nodoEncontrado != null ){
        $nodoEncontrado->setSig( new Nodo($valor) );
        $this->length++;
    }
    else
    {
      $this->agregarInicio($valor);
    }
}
   /**
* Busca y devuelve el nodo de la lista en el índice especificado.
* @param int $indice Índice del nodo a buscar.
* @return Nodo|null El nodo encontrado en el índice o null si no es válido.
*/
public function buscarIndice($indice){
    if ( $this->length > 0 && ($indice >=0 && $indice < $this->length) ){
        $ap = $this->root;          //     root > (3) < ap
        $cont = 0;
        while($ap->getSig() != null && $cont < $indice){
            $ap = $ap->getSig();
            $cont++;
        }
        if ($cont == $indice){
            return $ap;
        }
    }
    return null;
}

   /**
* Busca el valor especificado y devuelve el nodo que lo contiene.
* @param mixed $valor Valor a buscar en los nodos de la lista.
* @return Nodo|null El nodo que contiene el valor o null si no se encuentra.
*/
public function buscarValor($valor){
    if ( $this->root != null ){
        $ap = $this->root;
        while ($ap->getSig() != null && $valor != $ap->getVal()){
            $ap = $ap->getSig();
        }
        if ($valor == $ap->getVal()){
            return $ap;
        }
    }
    return null;
}

       /**
     * Elimina el primer nodo de la lista.
     */
    public function eliminarInicio(){
        if ($this->root != null) {
            if ($this->length > 1){
                $rootOriginal=$this->root;
                $this->root = $this->root->getSig();  
                $rootOriginal->setSig(null);
                $this->length--;          
            }
            else{   
                $this->root= null;
                $this->length--;
            }
        }
    }
       /**
    * Elimina el nodo en el índice especificado.
    * @param int $indice Índice del nodo a eliminar.
    */
    public function eliminarIndice($indice){ 
        if ($this->root != null && $indice <= $this->length) { 
            if($indice == 0){
                $this->eliminarInicio();
            } else {                                 
                $nodoAnterior = $this->buscarIndice($indice-1);
                $nodoEncontrado = $nodoAnterior->getSig();
                if ( $nodoEncontrado ){
                  $nodoAnterior->setSig( $nodoEncontrado->getSig() );
                  $nodoEncontrado->setSig( null );
                  $this->length--;
                }
            }
        }
    }

    public function eliminarUltimo(){
        if ($this->root != null) {
            $this->eliminarIndice($this->length - 1);
        }
    }

       /**
    * Modifica el valor de un nodo en el índice especificado.
    * @param mixed $valor Nuevo valor para el nodo.
    * @param int $indice Índice del nodo a modificar.
    */
    public function modificarIndice($valor, $indice){
        if ($this->root != null)
        {
            $nodoEncontrado = $this->buscarIndice($indice);        
            if ($nodoEncontrado)
            {
                $nodoEncontrado->setVal($valor);
            }
        }
    }

    /**
* Muestra los valores de todos los nodos de la lista.
*/
public function mostrar(){
    if ( $this->length > 0 ){
        $ap = $this->root;
        while($ap->getSig() != null ){
            echo $ap->getVal()."->";
            $ap = $ap->getSig();
        }
        echo $ap->getVal()."->";
    }
    echo "null";
}

/**
* Obtiene una sublista de la lista original.
* @param int $inicio Índice de inicio de la sublista.
* @param int $fin Índice de fin de la sublista.
* @return Lista|null La sublista obtenida o null si no es válida.
*/
public function sublista(int $inicio,int $fin){
    if($this->root != null){

    }
}


}
?>