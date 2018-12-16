<?php
	include "funciones.php";
	$factuar_id=$_GET['mi_id'];
	$consulta='SELECT cantidad, producto_id
				FROM detalle
				WHERE compra_id='.$factuar_id;
	$result=bd_consulta($consulta);
	while($row = mysqli_fetch_assoc($result))
	{
		//para cada fila vamos a disminuir existencias de la tabla PRODUCTO
		$producto_id=$row['producto_id'];
		$cantidad=$row['cantidad'];
		$consulta_2='UPDATE producto
					SET cantidad=cantidad-'.$cantidad.'
					WHERE producto_id='.$producto_id;
		bd_consulta($consulta_2);
	}
	$consulta_3='DELETE FROM detalle WHERE compra_id='.$factuar_id;
	bd_consulta($consulta_3);
	$consulta_4='DELETE FROM compra WHERE compra_id='.$factuar_id;
	bd_consulta($consulta_4);

	header('Location: index.php?op=10');
?>
