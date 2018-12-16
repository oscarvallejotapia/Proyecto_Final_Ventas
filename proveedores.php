<?php

$consulta2="select proveedor_id, nombre, rfc, telefono, correo from proveedor order by nombre asc";
$result2=bd_consulta($consulta2);

?>

<section id="listado">
	<header id="header_form"> Lista de Proveedores<a class="nuevo" href="index.php?op=60" style="hover">Nuevo</a></header>

	<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td>#</td>
					<td>Nombre</td>
					<td>RFC </td>
					<td>Telefono</td>
					<td>Correo</td>
					<td></td>
				</tr>
			</thead>

			<?php
			while($row = mysqli_fetch_assoc($result2))
			{
				echo '<tr>';
					echo '<td>'.$row["proveedor_id"].' </td>';
					echo '<td>'.$row["nombre"].' </td>';
					echo '<td>'.$row["rfc"].' </td>';
					echo '<td>'.$row["telefono"].' </td>';
					echo '<td>'.$row["correo"].' </td>';
					echo '<td><a href="deletProveedor.php?proveedor_id='.$row["proveedor_id"].'"> Eliminar</a>
							<a href="updateProveedor.php?proveedor_id='.$row["proveedor_id"].'"> Modificar</a>
							</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
