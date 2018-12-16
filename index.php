<?php
include "funciones.php";
include "cabecera.php";


if(!$user) include('autenticar.php');
else if(isset($_GET['op']))
    switch ($_GET['op'])
    {
      case "0":  include('salir.php');break;
      case "10": include('compra_listado.php'); break;
      case "11": include('factura_nuevo.php');break;
      case "12": include('compra_editar.php');break;
      case "30": include('productos.php');break;
      case "40": include('proveedores.php');break;
      case "50": include('usuarios.php');break;
      case "60" : include('newProvedor.php');break;
      case "70" : include('newProducto.php');break;
      case "80" : include('newUsuario.php');break;
      case "90" : include('ventas.php');break;
    }
include "pie.php";

 ?>
