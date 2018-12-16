<?php 
	include "funciones.php";
	$ClienteNombre=$_POST['cliente'];
	$ClienteRFC=$_POST['rfc'];
	$ClienteTelefono=$_POST['tel'];
	$ClienteCorreo=$_POST['mail'];

	$correcto;
	
	$consulta="INSERT INTO cliente (nombre,rfc,telefono,correo) VALUES ('$ClienteNombre','$ClienteRFC','$ClienteTelefono','$ClienteCorreo')";
	
	$result = bd_consulta($consulta);
	//$row = mysqli_fetch_assoc($result);
	if($result)
	{
		header('Location: index.php?op=160');
	}



?>
