<?php
  include "funciones.php";

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $usuario = $_POST['usuario'];
  $password = $_POST['pass'];
  $tipo = $_POST['tipo'];

  $consulta = "UPDATE usuario SET nombre_completo = '$nombre' , usuario = '$usuario', password = '$password', tipo = '$tipo' WHERE usuario_id = '$id'";
  $result = bd_consulta($consulta);
  if($result){
    header('Location: index.php?op=50');
  }
 ?>
