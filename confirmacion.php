<?php
include "funciones.php";
include "cabecera_cliente.php";

	$prod=$_POST['nom'];
	$cant=$_POST['cant'];
	if(isset($_SESSION['USER']))
	{
		$user_nombre=$_SESSION['USER_NOMBRE'];
	}

	$consultaCant = "SELECT * FROM producto WHERE producto_id ='$prod' ";

	$result1 = bd_consulta($consultaCant);
	$row = mysqli_fetch_assoc($result1);
	if ($cant > $row['cantidad']) {
		echo "No hay suficientes carros para su pedido, vuelva a realizarlo";
	}else {
		$consulta="UPDATE producto SET cantidad = cantidad - '$cant' WHERE producto_id = '$prod'";

		$result = bd_consulta($consulta);

		if($result)
		{
			$auto = $row['nombre'];
			$costo = $row['precio'];
			$total = $cant * $row['precio'];

			$regVenta = "INSERT INTO ventas (Automovil,Precio,Cantidad,Total,Cliente,Fecha) VALUES ('$auto','$costo','$cant','$total','$user_nombre',CURDATE())";
			$mov = bd_consulta($regVenta);
			header('Location: cliente.php?op=10');
		}
	}



 ?>
