<?php
  include "funciones.php";

  $id = $_GET['proveedor_id'];

  $consulta = "DELETE FROM proveedor WHERE proveedor_id = '$id'";
  $result=bd_consulta($consulta);

  if($result){
    //para cada fila vamos a disminuir existencias de la tabla PRODUCTO
    header('Location: index.php?op=40');
  }


 ?>
