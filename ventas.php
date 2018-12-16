<?php

$consulta2="select * from ventas";
$result2=bd_consulta($consulta2);
?>

<section id="listado">
	<header id="header_form"> Registro de ventas</header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td>#</td>
					<td>Automovil</td>
					<td>Precio</td>
					<td>Cantidad</td>
					<td>Total</td>
          <td>Cliente</td>
          <td>Fecha</td>
				</tr>
			</thead>

			<?php
			while( $row = mysqli_fetch_assoc($result2) )
			{
				echo '<tr>';
					echo '<td>'.$row["venta_id"].' </td>';
					echo '<td>'.$row["Automovil"].' </td>';
					echo '<td>'.$row["Precio"].' </td>';
					echo '<td>'.$row["Cantidad"].' </td>';
					echo '<td>'.$row["Total"].' </td>';
          echo '<td>'.$row["Cliente"].' </td>';
          echo '<td>'.$row["Fecha"].' </td>';
				echo '</tr>';
			} ?>

		</table>
</section>
