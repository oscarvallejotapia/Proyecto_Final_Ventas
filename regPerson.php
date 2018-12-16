<?php
	include "funciones.php";
	$nombre=$_POST['nombre'];
	$usuario=$_POST['usuario'];
	$pass=$_POST['pass'];
  $tipo = $_POST['tipo'];

	$correcto;

	$consulta="INSERT INTO usuario (usuario,password,nombre_completo,tipo) VALUES ('$usuario','$pass','$nombre','$tipo')";

	$result = bd_consulta($consulta);
	//$row = mysqli_fetch_assoc($result);
	if($result)
	{
		header('Location: index.php?op=50');
	}



?>
