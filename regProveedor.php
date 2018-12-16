<?php 
	include "funciones.php";
	$ProveedorNombre=$_POST['provedor'];
	$ProveedorRFC=$_POST['rfc'];
	$ProveedorTelefono=$_POST['tel'];
	$ProveedorCorreo=$_POST['mail'];

	$correcto;
	
	$consulta="INSERT INTO proveedor (nombre,rfc,telefono,correo) VALUES ('$ProveedorNombre','$ProveedorRFC','$ProveedorTelefono','$ProveedorCorreo')";
	
	$result = bd_consulta($consulta);
	//$row = mysqli_fetch_assoc($result);
	if($result)
	{
		header('Location: index.php?op=40');
	}



?>
