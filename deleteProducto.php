<?php
  include "funciones.php";

  $id = $_GET['producto_id'];

  $consulta = "DELETE FROM producto WHERE producto_id = '$id'";
  $result=bd_consulta($consulta);

  if($result){
    //para cada fila vamos a disminuir existencias de la tabla PRODUCTO
    header('Location: index.php?op=30');
}
 ?>
