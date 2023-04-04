<?php

require_once "Conexion.php";

//MODELO = CONTIENE LA LOGICA
class Curso extends Conexion{

  //objeto que almacene la conexion que viene desde el padre(conexion)
  //y la compartira con todos los metodos (CRUD+)
  private $accesoBD;

//constructor
  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  //metodo listar cursos
  public function listarCursos(){
    try{
      //1. preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_cursos_listar()");
      //2.ejecutamos la consulta
      $consulta->execute();
      //3.devolvemos el resultado (array asociativo)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
 }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  

  public function registrarCurso(){
  


  }
  public function eliminarCurso(){

    
  }
  
  public function actualizarCurso(){
  
    }
  }
  


  

