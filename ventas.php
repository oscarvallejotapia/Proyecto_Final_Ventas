<?php

$mi_consulta='SELECT * FROM venta';
$result=bd_consulta($mi_consulta);
?>

<section id="listado">
	<header id="header_form"> Lista de facturas</header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td># Id</td>
					<td>Fecha </td>
					<td>Folio</td>
					<td>Fecha registro</td>
					<td> id</td>
					<td><a href="index.php?op=140"> Agregar</a></td>
				</tr>
			</thead>

			<?php
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<tr>';
					echo '<td>'.$row["venta_id"].' </td>';
					echo '<td>'.$row["fecha_factura"].' </td>';
					echo '<td>'.$row["folio"].' </td>';
					echo '<td>'.$row["fecha_registro"].' </td>';
					echo '<td>'.$row["cliente_id"].' </td>';
					echo '<td><a href="venta_eliminar.php?mi_id='.$row["venta_id"].'"> Eliminar</a>
							<a href="index.php?op=110&mi_id='.$row["venta_id"].'"> Modificar</a>
							</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
