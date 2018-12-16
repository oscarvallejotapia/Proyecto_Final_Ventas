<section id="listado">	
	<header id="header_form"> Registro de Proveedores</header>

	<form action="regProveedor.php" method="post">
			<div class="myField">
				<label for="proveedor"> Nombre del proveedor: </label>
				<input type="text" name="provedor" id="provedor" required>
			</div>

			<div class="myField">
				<label for="rfc"> RFC: </label>
				<input type="text" name="rfc" id="rfc" required>
			</div>

			<div class="myField">
				<label for="tel"> Telefono: </label>
				<input type="text" name="tel" id="tel" required>
			</div>

			<div class="myField">
				<label for="mail"> Correo: </label>
				<input type="text" name="mail" id="mail" required>
			</div>

			<div class="myField">
				<input type="submit" class="formButton" value="Registrar" autofocus>
			</div>
	</form>

</section>
