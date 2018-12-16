<?php 
	include "funciones.php";
	$ProductoDesc=$_POST['desc'];
	$ProductoPrecio=$_POST['precio'];
	$ProductoCantidad=$_POST['cant'];

	$correcto;

	$consulta="INSERT INTO producto (nombre,precio,cantidad) VALUES ('$ProductoDesc','$ProductoPrecio','$ProductoCantidad')";

	$result = bd_consulta($consulta);
	//$row = mysqli_fetch_assoc($result);
	if($result)
	{
		header('Location: index.php?op=30');
	}

?>
