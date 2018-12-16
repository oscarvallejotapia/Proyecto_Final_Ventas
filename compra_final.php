<?php
include "funciones.php";
include "cabecera_cliente.php";
	$producto=$_POST['producto'];
	$cantidad=$_POST['cantidad'];

	$consulta="SELECT producto_id,nombre, precio,cantidad FROM producto WHERE producto_id ='$producto' ";

	$result = bd_consulta($consulta);
 ?>

 <section id="listado">
	<header id="header_form"> Carrito</header>
			<form action="confirmacion.php" name="miformulario" id="miformulario" method="post">
				<?php
				while( $row = mysqli_fetch_assoc($result) )
				{
					echo "<label for='total'>Total $</label>";
					echo "<input name='total' value=".$row["precio"] * $cantidad.">";
					echo "<label for='cant'>Cantidad</label>";
					echo "<input type ='text' id='cant' name='cant' value=".$cantidad.">";
					echo "<label for='nom'>Descripcion</label>";
					echo "<input name='n' id='n' value=".$row['nombre']." >";
					echo "<label for='precio'>Precio U $</label>";
					echo "<input type='text' name='precio' value=".$row['precio']." >";
					echo "<input type='text' name='nom' value=".$row['producto_id']." style='display: none'/>";
				}
				?>

			<div class="myField">

				<input form="miformulario" type="submit" class="formButton" value="Pagar" autofocus>
			</div></form>
</section>
