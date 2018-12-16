<?php
	include "funciones.php";
	$nombre=$_POST['nombre'];
	$usuario=$_POST['usuario'];
	$pass=$_POST['pass'];

	$correcto;

	$consulta="INSERT INTO usuario (usuario,password,nombre_completo,tipo) VALUES ('$usuario','$pass','$nombre','Cliente')";

	$result = bd_consulta($consulta);
	//$row = mysqli_fetch_assoc($result);
	if($result)
	{
		header('Location: /Pro_web');
	}



?>
