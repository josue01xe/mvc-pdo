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
  

  public function registrarCurso($datos = []){
     try{
      //1.Preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_cursos_registrar(?,?,?,?,?)");
      //2.Ejecutamos la consulta
      $consulta->execute(
        array(
          $datos["nombrecurso"],
          $datos["especialidad"],
          $datos["complejidad"],
          $datos["fechainicio"],
          $datos["precio"]
        )
      );
     }  
     catch(Exception $e){
      die($e->getMessage());
    }

  }
  public function eliminarCurso(){

    try{
      
    }
    catch(Exception $e){
      die($e->getMessage());
    }

  }
  
  public function actualizarCurso(){
  
    }
  }
  


  

