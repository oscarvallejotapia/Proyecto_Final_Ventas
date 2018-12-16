<?php
  include "funciones.php";

  $id = $_POST['id'];
  $nombre = $_POST['provedor'];
  $rfc = $_POST['rfc'];
  $telefono = $_POST['tel'];
  $correo = $_POST['mail'];

  $consulta = "UPDATE proveedor SET nombre = '$nombre' , rfc = '$rfc', telefono = '$telefono' ,correo = '$correo' WHERE proveedor_id = '$id'";
  $result = bd_consulta($consulta);
  if($result){
    header('Location: index.php?op=40');
  }
 ?>
