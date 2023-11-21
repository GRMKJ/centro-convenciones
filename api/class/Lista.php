<?php
include "Nodo.php";

class Lista
{
    private $root;
    private $length;

    public function __Construct($valor=null){   // 
        if ($valor != null) {   // new Lista(5)  lista  [ (5)>null  ]
            $this->root = new Nodo($valor);  //          root^ 
            $this->length = 1;
        } else {               // new Lista()     
            $this->root  = null;                // lista [ null ]
            $this->length=0;                  //          root^
        }
    }

    public function getLength(){
        return $this->length;
    }

    public function agregarInicio($valor){
        /*
        if ($this->root == null)       new Lista(); 
        {
          $this->root = new Nodo($valor);
        }
        else                           new Lista(5);   3      4>5
        {
          $nodoNuevo = new Nodo($valor, $this->root); (3)>(4)>(5)>
          $this->root = $nodoNuevo;                  root>(3)>(4)>(5)
        }
        */                                                                     //root >  (3)>(4)
        $this->root == null ? $this->root = new Nodo($valor) : $this->root = new Nodo($valor, $this->root);
        $this->length++;
    }

    public function agregarIndice($valor, $indice){
        if ($this->root == null)
        {
          $this->agregarInicio($valor);
        }
        else
        {
          $nodoEncontrado = $this->buscarIndice($indice-1);
          if ( $nodoEncontrado != null ){
            /*
             $nuevo = new Nodo($valor);
             $nuevo->setSig($nodoEncontrado->getSig());
             $nodoEncontrado->setSig($nuevo);
            */
            $nodoEncontrado->setSig( new Nodo($valor, $nodoEncontrado->getSig()) );
            $this->length++;
          }
        }
    }

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
    public function eliminarIndice($indice){ 
        if ($this->root != null && $indice <= $this->length) { //3
            if($indice == 0){
                $this->eliminarInicio();
            } else {                                 // 0
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

    public function sublista(int $inicio,int $fin){
        if($this->root != null){
            
        }
    }

    

}
?>