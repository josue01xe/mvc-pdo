<?php
// esta clase le permitira a los modelos acceder y comsumir los datos
class Conexion{

  // atributos
  private $host = "localhost";  //servidor
  private $port = "3306";       //puerto comunciacion BD
  private $database = "senati"; //codificacion (idioma)
  private $charset ="UTF8";     //Usuario (raiz)
  private $user ="root";        //contraseña
  private $password ="";

//atributo (instancia PDO) que almacena la conexion
  private $pdo;

  //metodo 1: acceder a la BD
  private function conectarServidor(){
    //Constructor:
    //new PDO("CADENA_CONEXION", "USER", "PASSWORD");
    $conexion = new PDO("msql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}", $this->user, $this->password);

    return $conexion;
  }

  //metodo 2: retorna el acceso
  public function getConexion(){
    try{
//pasaremos la conexion al atributo/objeto pdo

$this->pdo = $this->conectarServidor();

//controlar los errores (sera controlado por TRY-CATCH)
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//retornamos la conexion al modelo que lo necesite

      return $this->pdo;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>