<?php
	include "funciones.php";
	$proveedor=$_GET['proveedor'];
	$fecha=$_GET['fecha'];
	$folio=$_GET['folio'];
	if(isset($_GET['cerrar']))
		$cerrar=1;
	else
		$cerrar=0;
	$consulta='INSERT INTO compra VALUES(DEFAULT,"'.$fecha.'",'.$folio.
										',CURRENT_DATE(),'.$proveedor.','.$cerrar.')';
	if(bd_consulta($consulta))
		echo "Se insertaron datos exitosamente ";
	else
		echo "Error en la operación de insercion";


	for($partida=1;$partida<=5;$partida++)
	{
		$articulo=$_GET['producto'.$partida];
		$precio=$_GET['precio'.$partida];
		$cantidad=$_GET['cantidad'.$partida];
		if($articulo!=-1)
		{
			$consulta='INSERT INTO detalle 
						VALUES(DEFAULT,'.$cantidad.','.$precio.
						',(SELECT MAX(compra_id)FROM compra),'.$articulo.')';
			if(bd_consulta($consulta))
				echo "<br>Se inserto partida ".$partida." exitosamente";
			else
				echo "Error en la operación de insercion";	

			
			//inventarios se actualiza solo si está cerrada la factura
			if($cerrar)
			{	
				$consulta='UPDATE producto
						SET cantidad=cantidad+'.$cantidad.'
						WHERE producto_id='.$articulo;

				if(bd_consulta($consulta))
					echo " Se incremento inventario";
				else
					echo "Error en la operación de insercion";	
			}
		}
	}

	header('Location: index.php?op=10');


?>



