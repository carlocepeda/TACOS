<?php
    class Taco implements JsonSerializable{
        //atributos
        private $tort;
        private $sabores;
        private $verd;
        private $cant;
        private $salsa;
        private $comentarios;

        //constructor
        function __construct($A, $B, $C, $D, $E, $F){
            $this -> tort = $A;
            $this -> sabores = $B;
            $this -> verd = $C;
            $this -> cant = $D;
            $this -> salsa = $E;
            $this -> comentarios = $F;
            }
            function getTaco(){

                echo "<tr>";
                echo "<td> $this->tort </td>";
                echo "<td> $this->sabores </td>";
                echo "<td> $this->verd </td>";
                echo "<td> $this->cant </td>";
                echo "<td> $this->salsa </td>";
                echo "<td> $this->comentarios </td>";
                echo "<tr>";
            }
        function jsonSerialize(){
            return get_object_vars($this);

        }
    }
?>