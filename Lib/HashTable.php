<?php

class HashTable
{

    private $buckets; // Matriz para almacenar datos
    private $size = 1500; // Registre el tamaño de la matriz de cubos
    public function __construct(){

        $this->buckets = new SplFixedArray($this->size);
        // SplFixedArray es más eficiente, también puedes usar una matriz general
    }

    public function hashfunc($key){
        $strlen = strlen ($key); // Devuelve la longitud de la cadena
        $hashval = 0;
        for($i = 0; $i<$strlen ; $i++){
            $hashval += ord ($key[$i]); // Devuelve el valor ASCII
        }
        return $hashval% 1033; // devuelve el valor después de tomar el resto
    }


    public function insert($key,$value){

        $index = $this->hashfunc($key);
        if(isset($this->buckets[$index])){
            $newNode = new HashNode($key,$value,$this->buckets[$index]);
        }else{
            $newNode = new HashNode($key,$value,null);
        }
        $this->buckets[$index] = $newNode;

    }

    public function find($key){

        $index = $this->hashfunc($key);

        $current = $this->buckets[$index];
        echo "</br>";
        var_dump($current);
        while (isset ($current)) {// Recorrer la lista vinculada actual
            if ($current-> key == $key) {// Compare la clave de nodo actual
                return $current->value;
            }
            $current = $current->nextNode;
            //return $current->value;
        }
        return NULL;
    }



}

class HashNode{
    public $key; // Palabra clave
    public $value; // Datos
    public $nextNode; // HASHNODE para almacenar información
    public function __construct($key,$value,$nextNode = NULL){
        $this->key = $key;
        $this->value = $value;
        $this->nextNode = $nextNode;
    }

}
/*
$ht = new HashTable();
$ht->insert('Bucket1','value1');
$ht->insert('Bucket2','value2');
$ht->insert('Bucket3','value3');
echo $ht->find('Bucket2');*/
?>