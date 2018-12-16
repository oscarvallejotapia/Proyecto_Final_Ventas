<section id="listado">
	<header id="header_form"> Registrar</header>

	<form action="regPerson.php" method="post">
			<div class="myField">
				<label for="nombre"> Nombre completo: </label>
				<input type="text" name="nombre" id="nombre" required>
			</div>

			<div class="myField">
				<label for="usuario"> Usuario: </label>
				<input type="text" name="usuario" id="usuario" required>
			</div>

			<div class="myField">
				<label for="pass"> Password: </label>
				<input type="text" name="pass" id="pass" required>
			</div>
      <div class="myField">
        <label for="tipo"> Rol: </label>
        <select class="" name="tipo">
          <option value="Administrador" disabled>Seleccionar</option>
          <option value="Administrador">Administrador</option>
          <option value="Cliente">Cliente</option>
        </select>
      </div>


			<div class="myField">
				<input type="submit" class="formButton" value="Registrar" autofocus>
			</div>
	</form>

</section>
