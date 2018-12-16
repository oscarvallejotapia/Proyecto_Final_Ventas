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
      case "90" : include('venta_listado.php');break;
      case "100" : include('venta_eliminar.php');break;
      case "110" : include('venta_eliminar_editar.php');break;
      case "120" : include('venta_editar.php');break;
      case "130" : include('venta_final.php');break;
      case "140" : include('venta_nueva.php');break;
      case "150" : include('venta_procesa.php');break;
      case "160" : include('cliente_listado.php');break;
      case "170" : include('cliente_nuevo.php');break;
      case "180" : include('cliente_editar.php');break;
      case "190" : include('cliente_eliminar.php'); break;
    }
include "pie.php";

 ?>
