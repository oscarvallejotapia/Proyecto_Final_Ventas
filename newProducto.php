<section id="listado">
	<header id="header_form"> Surtir almacen</header>

	<form action="regProducto.php" method="post">
			<div class="myField">
				<label for="desc"> Descripción: </label>
				<input type="text" name="desc" id="desc" required>
			</div>

			<div class="myField">
				<label for="precio"> Precio: </label>
				<input type="text" name="precio" id="precio" required>
			</div>

			<div class="myField">
				<label for="cant"> Cantidad: </label>
				<input type="text" name="cant" id="cant" required>
			</div>

			<div class="myField">
				<input type="submit" class="formButton" value="Agregar" autofocus>
			</div>
	</form>

</section>
