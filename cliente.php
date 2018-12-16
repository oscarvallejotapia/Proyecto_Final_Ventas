<?php	
include "funciones.php";
include "cabecera_cliente.php";


if(!$user) include('autenticar.php');
else if(isset($_GET['op']))
		switch ($_GET['op'])
		{
			case "0":  include('salir.php');break;
			case "10": include('compras.php'); break;
		}
include "pie.php";
?>
