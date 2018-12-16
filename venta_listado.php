<?php

$mi_consulta='SELECT c.venta_id,c.fecha_registro,
				c.folio,p.nombre AS cliente, c.fecha_factura,
					(SELECT SUM(cantidad*precio) AS mi_total
					FROM detalle_venta
					WHERE venta_id=c.venta_id) AS total
			FROM venta c
			INNER JOIN cliente p ON c.cliente_id=p.cliente_id
			ORDER BY c.venta_id DESC';
$result=bd_consulta($mi_consulta);
?>

<section id="listado">
	<header id="header_form"> Lista de Ventas</header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td># Id</td>
					<td>Fecha </td>
					<td>Cliente</td>
					<td>Folio</td>
					<td>Captura</td>
					<td>Total</td>
					<td><a href="index.php?op=140"> Agregar</a></td>
				</tr>
			</thead>

			<?php
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<tr>';
					echo '<td>'.$row["venta_id"].' </td>';
					echo '<td>'.$row["fecha_factura"].' </td>';
					echo '<td>'.$row["cliente"].' </td>';
					echo '<td>'.$row["folio"].' </td>';
					echo '<td>'.$row["fecha_registro"].' </td>';
					echo '<td>'.$row["total"].' </td>';
					echo '<td><a href="venta_eliminar.php?mi_id='.$row["venta_id"].'"> Eliminar</a>
							<a href="index.php?op=120&mi_id='.$row["venta_id"].'"> Modificar</a>
							</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
