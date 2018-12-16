<?php

$consulta2="select usuario_id,usuario, password, nombre_completo from usuario order by usuario asc";
$result2=bd_consulta($consulta2);
?>

<section id="listado">
	<header id="header_form"> Lista de Usuarios<a class="nuevo" href="index.php?op=80" style="hover">Registrar</a></header>
		<table id="tabla" >
			<thead id="encabezado_tabla">
				<tr>
					<td>#</td>
					<td>Usuario</td>
					<td>Contraseña</td>
					<td>Nombre completo</td>
					<td></td>
				</tr>
			</thead>

			<?php
			while($row = mysqli_fetch_assoc($result2))
			{
				echo '<tr>';
					echo '<td>'.$row["usuario_id"].' </td>';
					echo '<td>'.$row["usuario"].' </td>';
					echo '<td>'.$row["password"].' </td>';
					echo '<td>'.$row["nombre_completo"].' </td>';
					echo '<td><a href="deleteUsuario.php?usuario_id='.$row["usuario_id"].'"> Eliminar</a>
						<a href="updateUsuario.php?usuario_id='.$row["usuario_id"].'"> Modificar</a>
						</td>';
				echo '</tr>';
			} ?>

		</table>
</section>
