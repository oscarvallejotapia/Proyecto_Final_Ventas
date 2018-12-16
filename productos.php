<?php

$consulta2="select producto_id,nombre, precio, cantidad from producto";
$result2=bd_consulta($consulta2);
?>

<section id="listado">
	<header id="header_form"> Lista de Productos<a class="nuevo" href="index.php?op=70" style="hover">Surtir</a></header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td>#</td>
					<td>Descripcion</td>
					<td>Precio </td>
					<td>Cantidad</td>
					<td></td>
				</tr>
			</thead>

			<?php
			while( $row = mysqli_fetch_assoc($result2) )
			{
				echo '<tr>';
					echo '<td>'.$row["producto_id"].' </td>';
					echo '<td>'.$row["nombre"].' </td>';
					echo '<td>'.$row["precio"].' </td>';
					echo '<td>'.$row["cantidad"].' </td>';
					echo '<td><a href="deleteProducto.php?producto_id='.$row["producto_id"].'"> Eliminar</a>
						<a href="updateProducto.php?producto_id='.$row["producto_id"].'"> Modificar</a>
						</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
