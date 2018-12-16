
<?php
	include "funciones.php";
	$myUser=$_POST['usuario'];
	$myPassword=$_POST['password'];

	$consulta='SELECT nombre_completo as name, usuario_id, tipo
				FROM usuario
				WHERE usuario.usuario="'.$myUser.'" AND usuario.password="'.$myPassword.'"';

	$result = bd_consulta($consulta);
	$row = mysqli_fetch_assoc($result);
	if($row)
	{
		SESSION_START();
		$_SESSION['USER']=$myUser;
		$_SESSION['USER_NOMBRE']=$row['name'];
		$_SESSION['USER_ID']=$row['usuario_id'];
	}

	if ($row['tipo'] == "Administrador") {
		header('Location: index.php');
	}

	if ($row['tipo'] == "Cliente") {
		header('Location: cabecera_cliente.php');
	}


?>
