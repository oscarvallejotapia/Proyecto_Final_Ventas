<?php

$mi_consulta='SELECT c.compra_id,c.fecha_registro,
				c.folio,p.nombre AS Proveedor, c.fecha_factura,
					(SELECT SUM(cantidad*precio) AS mi_total
					FROM detalle
					WHERE compra_id=c.compra_id) AS total
			FROM compra c
			INNER JOIN proveedor p ON c.proveedor_id=p.proveedor_id
			ORDER BY c.compra_id DESC';
$result=bd_consulta($mi_consulta);
?>

<section id="listado">
	<header id="header_form"> Lista de facturas</header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td># Id</td>
					<td>Fecha </td>
					<td>Proveedor</td>
					<td>Folio</td>
					<td>Captura</td>
					<td>Total</td>
					<td><a href="index.php?op=11"> Agregar</a></td>
				</tr>
			</thead>

			<?php
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<tr>';
					echo '<td>'.$row["compra_id"].' </td>';
					echo '<td>'.$row["fecha_factura"].' </td>';
					echo '<td>'.$row["Proveedor"].' </td>';
					echo '<td>'.$row["folio"].' </td>';
					echo '<td>'.$row["fecha_registro"].' </td>';
					echo '<td>'.$row["total"].' </td>';
					echo '<td><a href="compra_eliminar.php?mi_id='.$row["compra_id"].'"> Eliminar</a>
							<a href="index.php?op=12&mi_id='.$row["compra_id"].'"> Modificar</a>
							</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
