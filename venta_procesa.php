<?php
	include "funciones.php";
	$cliente=$_GET['cliente'];
	$fecha=$_GET['fecha'];
	$folio=$_GET['folio'];
	if(isset($_GET['cerrar']))
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
		$articulo=$_GET['producto'.$partida];
		$precio=$_GET['precio'.$partida];
		$cantidad=$_GET['cantidad'.$partida];
		
		if($articulo!=-1)
		{
			$consulta_existencia= 'SELECT cantidad from producto where producto_id =='.$articulo;
			$existencia = bd_consulta($consulta_existencia);

			if ($cantidad <= $existencia) {
				echo "Si hay existencia";

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
					$consulta2='UPDATE producto
							SET cantidad = cantidad -'.$cantidad.'
							WHERE producto_id='.$articulo;

					if(bd_consulta($consulta2))
						echo " Se incremento inventario";
					else
						echo "Error en la operación de insercion";	
				}



			}
			else {
				echo"No existencia para el articulo ".$articulo;
			}

			
			
		}
	}

	header('Location: index.php?op=90');


?>



