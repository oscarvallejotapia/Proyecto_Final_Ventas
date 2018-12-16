<?php
  include "funciones.php";

  $id = $_POST['id'];
  $nombre = $_POST['desc'];
  $prec = $_POST['precio'];
  $cant = $_POST['cant'];

  $consulta = "UPDATE producto SET nombre = '$nombre' , precio = '$prec', cantidad = '$cant' WHERE producto_id = '$id'";
  $result = bd_consulta($consulta);
  if($result){
    header('Location: index.php?op=30');
  }
 ?>
