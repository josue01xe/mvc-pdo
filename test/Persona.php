<?php
class Persona{

  private $apellidos;
  private $nombres;
  private $estadoCivil;
  private $numeroHijos;
  private $telefono;
 
  //metodos magicos
 public function __GET($atributo){
   return $this->$atributo;
 }
 public function __SET($atributo, $valor){
  $this->$atributo = $valor;
 }
}

$persona1 = new Persona();

$persona1->__SET("apellidos", "BULEJE FLORES");
$persona1->__SET("nombres", "Josue");
$persona1->__SET("telefono", "924340839");

echo $persona1->__GET("apellidos");
echo $persona1->__GET("nombres");
echo $persona1->__GET("telefono");