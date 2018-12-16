<?php

	SESSION_START();

	if(isset($_SESSION['USER']))
	{
		$user=$_SESSION['USER'];
		$user_nombre=$_SESSION['USER_NOMBRE'];
	}
	else
	{
		$user=false;
		$user_nombre="No ha iniciado sesión";
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Formulario con HTML5">
		<meta name="keywords" content="HTML5, CSS3, Javascript">
		<title>EMM Racing</title>
		<link rel="stylesheet" href="mis_estilos.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
		<link href="https://unpkg.com/ionicons@4.5.0/dist/css/ionicons.min.css" rel="stylesheet">
		<script src="mis_scripts.js">
		</script>
	</head>
	<body>
		<header id="cabecera">
				<img src="images/car.jpeg" style="height: 320px; width: 99%;">
		</header>
			 <nav class="menu" id="menu_box" style="background-color: #000066;">
				<ul>
					<li style="width: 120px;"><a href="index.php?op=10" style="text-decoration: none;">Compras  <i class="icon ion-md-document"></i></a></li>
					<li style="width: 170px;"><a href="index.php?op=40" style="text-decoration: none;">Proveedores <i class="icon ion-md-briefcase"></i></a></li>
					<li style="width: 150px;"><a href="index.php?op=30" style="text-decoration: none;">Productos <i class="icon ion-md-car"></i></a></li>
					<li style="width: 110px;"><a href="index.php?op=50" style="text-decoration: none;">Usuarios <i class="icon ion-md-person"></i></a></li>
					<li style="width: 110px;"><a href="index.php?op=90" style="text-decoration: none;">Ventas <i class="icon ion-md-pricetag"></i></a></li>
					<li style="width: 100px;"><a href="index.php?op=160" style="text-decoration: none;">Clientes <i class="icon ion-md-person"></i></a></li>
					<li style="width: 130px; margin-right: -10px;"><a href="index.php?op=0" style="text-decoration: none;"> Salir <i class="icon ion-md-exit"></i></a></li>
				</ul>
			</nav>
			<?php echo $user_nombre; ?>

	</body>
