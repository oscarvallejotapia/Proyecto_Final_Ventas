<script>
	function registrar () {
		document.getElementById('form_reg').style.display = 'block';
		document.getElementById('form_box').style.display = 'none';
	}
</script>


<section id="form_box" style="width: 500px; transform: translateX(90%);">
	<header id="header_form" style="transform: translateX(5%); width: 340px;"> Introduce usuario y Contraseña<a class="nuevo" style="cursor: pointer;" onclick="registrar()">Registrate</a></header>
	<div>
		<img src="images/user.png"  style="width: 90px; height: 90px; transform: translateX(180%);">
	</div>
	<form action="valida_usuario.php" name="miformulario" id="miformulario" method="post" style="transform: translateX(20%);">
			<div class="myField">
				<label for="usuario"> Usuario: </label>
				<input type="text" name="usuario" id="usuario"
						placeholder="nombre de usuario" required>
			</div>

			<div class="myField">
				<label for="password"> Password: </label>
				<input type="password" name="password" id="password"
										placeholder="escribe tu contraseña" required>
			</div>

			<div class="myField">
				<input type="submit" class="formButton" value="Ingresar" autofocus>
			</div>
	</form>
</section>

<section id="form_reg" style="display: none;">
	<header id="header_form"> Ingresa tus datos</header>
	<div>
		<img src="images/add.png"  style="width: 90px; height: 90px; transform: translateX(630%);">
	</div>
	<form action="regUsuario.php" name="miformulario" id="miformulario" method="post">
			<div class="myField">
				<label for="nombre"> Nombre completo: </label>
				<input type="text" name="nombre" id="nombre"
						placeholder="nombre completo" required>
			</div>


			<div class="myField">
				<label for="usuario"> Usuario: </label>
				<input type="text" name="usuario" id="usuario"
						placeholder="nombre de usuario" required>
			</div>

			<div class="myField">
				<label for="passa"> Password: </label>
				<input type="text" name="pass" id="pass"
						placeholder="password" required>
			</div>

			<div class="myField">
				<input type="submit" class="formButton" value="Registrar" autofocus>
			</div>
	</form>
</section>
