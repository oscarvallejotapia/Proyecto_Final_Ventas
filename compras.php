<?php
	$consulta2="SELECT  producto_id, nombre, precio, cantidad FROM producto";
	$result2=bd_consulta($consulta2);
 ?>

 <section id="form_box">
		<header id="header_form"> Realizar una compra</header>
		<form action="compra_final.php" name="miformulario" id="miformulario" method="post">


				<?php
				for($i=1;$i<2;$i++)  {
				echo '<select name="producto" id="producto'.$i.'" onchange="actualizaPrecio('.$i.');"> ';
				mysqli_data_seek($result2, 0);
				while($row = mysqli_fetch_assoc($result2))
				{
					echo '<option mi_precio= "'.$row["precio"].'" mi_cantidad= "'.$row["cantidad"].'" value="'.$row["producto_id"].'">';
					echo $row["nombre"];
					echo '</option>';
				}
				echo '</select>';

				echo '<label for="precio"> Precio: $ </label>';
				echo '<input type="text"  name="prec" id="precio'.$i.'" disabled min="0" value="'.$row["precio"].'" onchange="actualiza('.$i.');">';

				 } ?>

				<label for="cantidad">Cantidad deseada:</label>
				<input type="number" name="cantidad" id="cantidad" value="0" min=0>
			<div class="myField">

				<input form="miformulario" type="submit" class="formButton" value="Siguiente" autofocus>
			</div>
		</form>
	</section>
