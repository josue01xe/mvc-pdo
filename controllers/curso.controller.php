<?php

require_once '../models/Curso.php';

if(isset($_POST['operacion'])){

  $curso = new Curso();

if($_POST['operacion']== 'listar'){

  $datosObtenidos = $curso->listarCursos();

  //En esta ocasion no enviaremos un objeto JSON, en su lugar
  //el controlador renderizara las filas que necesita <tbody></tbody>
  //echo json_encode($datosObtenidos);

  //Pso 1: Verificar que el objeto contenga datos
  if ($datosObtenidos){
    $numeroFila = 1;
   
    foreach($datosObtenidos as $curso){
          //PASO 3: Ahora construimos las filas
          echo"
           <tr>
           <td>{$numeroFila}</td>
           <td>{$curso['nombrecurso']}</td>
           <td>{$curso['especialidad']}</td>
           <td>{$curso['complejidad']}</td>
           <td>{$curso['fechainicio']}</td>
           <td>{$curso['precio']}</td>
           <td>
           
           <a href='#' data-idcurso='{$curso['idcurso']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash-fill'></i></a>
           <a href='#' data-idcurso='{$curso['idcurso']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
           </td>
           </tr>
          ";
          $numeroFila++;
    }
  }


}

if($_POST['operacion']== 'registrar'){

  //Paso 1: recoger los datos que nos envia la vista (FORM, utilizando AJAX)
  //$_POST : esto es lo que nos envia desde FORM
  $datosForm = [
    "nombrecurso"  => $_POST['nombrecurso'],
    "especialidad" => $_POST['especialidad'],
    "complejidad"  => $_POST['complejidad'],
    "fechainicio"  => $_POST['fechainicio'],
    "precio"       => $_POST['precio']
  ];

  //paso 2: enviar el arreglo como parametro del metodo registrar
  $curso->registrarCurso($datosForm);

 

}

if ($_POST['operacion'] =='eliminar'){
  $curso->eliminarCurso($_POST['idcurso']);
  }
  
}