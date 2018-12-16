<?php
	include "funciones.php";
	$factuar_id=$_GET['mi_id'];
	$consulta='SELECT cantidad, producto_id
				FROM detalle_venta
				WHERE venta_id='.$factuar_id;
	$result=bd_consulta($consulta);
	while($row = mysqli_fetch_assoc($result))
	{
		//para cada fila vamos a disminuir existencias de la tabla PRODUCTO
		$producto_id=$row['producto_id'];
		$cantidad=$row['cantidad'];
		$consulta_2='UPDATE producto
					SET cantidad=cantidad+'.$cantidad.'
					WHERE producto_id='.$producto_id;
		bd_consulta($consulta_2);
	}
	$consulta_3='DELETE FROM detalle_venta WHERE venta_id='.$factuar_id;
	bd_consulta($consulta_3);
	$consulta_4='DELETE FROM venta WHERE venta_id='.$factuar_id;
	bd_consulta($consulta_4);



	$cliente=$_POST['cliente'];
	$fecha=$_POST['fecha'];
	$folio=$_POST['folio'];
	if(isset($_POST['cerrar']))
		$cerrar=1;
	else
		$cerrar=0;
	$consulta='INSERT INTO venta VALUES(DEFAULT,"'.$fecha.'",'.$folio.
										',CURRENT_DATE(),'.$cliente.','.$cerrar.')';
	if(bd_consulta($consulta))
		echo "Se insertaron datos exitosamente ";
	else
		echo "Error en la operación de insercion";


	for($partida=1;$partida<=5;$partida++)
	{
		$articulo=$_POST['producto'.$partida];
		$precio=$_POST['precio'.$partida];
		$cantidad=$_POST['cantidad'.$partida];
		if($articulo!=-1)
		{
			$consulta='INSERT INTO detalle_venta 
						VALUES(DEFAULT,'.$cantidad.','.$precio.
						',(SELECT MAX(venta_id)FROM venta),'.$articulo.')';
			if(bd_consulta($consulta))
				echo "<br>Se inserto partida ".$partida." exitosamente";
			else
				echo "Error en la operación de insercion";	

			
			//inventarios se actualiza solo si está cerrada la factura
			if($cerrar)
			{	
				$consulta='UPDATE producto
						SET cantidad=cantidad-'.$cantidad.'
						WHERE producto_id='.$articulo;

				if(bd_consulta($consulta))
					echo " Se incremento inventario";
				else
					echo "Error en la operación de insercion";	
			}
		}
	}

	header('Location: index.php?op=90');


?>



