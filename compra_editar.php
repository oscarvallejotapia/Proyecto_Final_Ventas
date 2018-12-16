<?php

$mi_consulta="SELECT proveedor_id, nombre, rfc
				FROM proveedor
				ORDER BY nombre ASC";
$consulta2="SELECT nombre, producto_id, precio
				FROM PRODUCTO
				ORDER BY nombre";


$result=bd_consulta($mi_consulta);
$result2=bd_consulta($consulta2);
$mi_factura=$_GET['mi_id'];



$consulta_factura='SELECT fecha_factura, folio, proveedor.proveedor_id,cerrado,rfc
					FROM compra,proveedor
					WHERE proveedor.proveedor_id=compra.proveedor_id
						AND compra_id='.$mi_factura;
$result_factura=bd_consulta($consulta_factura);
$row_fact=mysqli_fetch_assoc($result_factura);
$cerrado=$row_fact['cerrado'];
if($cerrado)
	$sololectura=" readonly ";
else
	$sololectura="";
$proveedor_actual=$row_fact['proveedor_id'];
$rfc_actual=$row_fact['rfc'];
$fecha_actual=$row_fact['fecha_factura'];
?>

	<section id="form_box">
		<header id="header_form"> Editando una factura <?php echo $mi_factura ?></header>
		
		<form action="compra_eliminar_editar.php?mi_id=<?php echo $mi_factura ?>" name="miformulario" id="miformulario" method="post">
			<div class="myField">
				<label for="proveedor"> Proveedor: </label>
				<select id="proveedor" name="proveedor" class="largo"
													onchange="actualizaRfc();">
					<option value="-1"></option>
				<?php while($row = mysqli_fetch_assoc($result))
				{
					if($row["proveedor_id"]==$proveedor_actual)
						$proveedor_seleccionado=" selected ";
					else
						$proveedor_seleccionado="";
					echo '<option mi_rfc= "'.$row["rfc"].'" value="'.$row["proveedor_id"].'"'.$proveedor_seleccionado.'>';
					echo $row["nombre"];
					echo '</option>';
				} ?>
				</select>
			</div>

			<div class="myField">
				<label for="fecha"> Fecha local: </label>
				<input type="date" class="corto" name="fecha2" id="fecha2"
					value="<?php echo $fecha_actual; ?>" required>
			</div>
			<div class="myField">
				<label for="folio"> Folio: </label>
				<input type="number" class="extracorto"  name="folio" id="folio"  min="0"
						value=<?php echo $row_fact['folio']; echo $sololectura; ?>   required>
			</div>
			<div class="myField">
				<label for="rfc"> RFC: </label>
				<input type="text" class="corto" name="rfc" id="rfc" readonly value="<?php echo $rfc_actual ?>">
			</div>
			<div class="myField">
				<label for="cerrar"> Cerrar Factura: </label>
				<input type="checkbox" class="extracorto" name="cerrar" id="cerrar"  >
			</div>
			<table id="tabla" >
				<thead id="encabezado_tabla">
					<tr>
						<td>#</td>
						<td>Cant</td>
						<td >Artículo/Servicio</td>
						<td>Precio Unitario</td>
						<td>SubTotal</td>
					</tr>
				</thead>

				<?php 
					$consulta_detalle ="SELECT d.detalle_id, d.cantidad, d.precio, d.compra_id, 
					d.producto_id, p.nombre FROM detalle d INNER JOIN producto p 
					ON d.producto_id = p.producto_id WHERE compra_id = " . $mi_factura;
	
					$result3 = bd_consulta($consulta_detalle);

					$i = 0;

					while($registros = mysqli_fetch_assoc($result3))
					{		
							$i = $i+1;
							echo '<tr>';
							echo '<td> <input type="text" value="'.$i.'" readonly /> </td>';

							echo '<td> <input type="number" min="1"  value='. $registros["cantidad"] .' name="cantidad'.$i.'"
										id="cantidad'.$i.'" onchange="actualiza('.$i.');"/>	</td> ';

							echo '<td> <select name="producto'.$i.'" id="producto'.$i.'" onchange="actualizaPrecio('.$i.');"/> ';
							echo '<option mi_precio="0" value="-1"></option>';
							
							mysqli_data_seek($result2, 0);
							while($productos = mysqli_fetch_assoc($result2))
							{
								echo '<option mi_precio= "'.$productos["precio"].'" value="'. $productos["producto_id"].'"';
								
								if($registros["nombre"] == $productos["nombre"]) {
									echo " selected >";
								} else {
									echo ">";
								}
								echo $productos["nombre"];
								echo '</option>';
							}
							echo '</select>	</td>';
							echo '<td> <input type="number" min="0" value="' . $registros["precio"] . '"  id="precio'.$i.'"
										name="precio'.$i.'" onchange="actualiza('.$i.');"/> </td>';
							echo '<td> <input type="text"  readonly value="'. $registros["precio"] * $registros["cantidad"] . '"  id="subtotal'.$i.'" /></td>';
							echo '</tr>';
					}
					
					$i++;
					while($i < 6) { 
						echo '<tr>';


							echo '<td> <input type="text" value="'.$i.'" readonly /> </td>';

							echo '<td> <input type="number" min="1"  value="1" name="cantidad'.$i.'"
										id="cantidad'.$i.'" onchange="actualiza('.$i.');"/>	</td> ';

							echo '<td> <select name="producto'.$i.'" id="producto'.$i.'" onchange="actualizaPrecio('.$i.');"/> ';
							echo '<option mi_precio="0" value="-1"></option>';
							
							mysqli_data_seek($result2, 0);
							while($productos = mysqli_fetch_assoc($result2))
							{
								echo '<option mi_precio= "'.$productos["precio"].'" value="'. $productos["producto_id"].'"';
								
								if($registros["nombre"] == $productos["nombre"]) {
									echo " selected >";
								} else {
									echo ">";
								}
								echo $productos["nombre"];
								echo '</option>';
							}
							echo '</select>	</td>';
							echo '<td> <input type="number" min="0" value="0.00"  id="precio'.$i.'"
										name="precio'.$i.'"  onchange="actualiza('.$i.');"/> </td>';
							echo '<td> <input type="text"  readonly value="0.00"  id="subtotal'.$i.'" /> </td>';
							echo '</tr>';


						$i = $i + 1;
					}

				?>
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> <input type="text" value="Sub Total:" readonly class="totales"/> </td>
					<td> <input type="text"  readonly value="0.00"  id="subtotal" /> </td>
				</tr>
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> <input type="text" value="Impuestos:" readonly class="totales"/> </td>
					<td> <input type="text"  readonly value="0.00"  id="impuesto" /> </td>
				</tr>
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> <input type="text" value="Total:" readonly class="totales"/> </td>
					<td> <input type="text"  readonly value="0.00"  id="total" /> </td>
				</tr>
			</table>
			<div class="myField">
				<input form="miformulario" type="submit" class="formButton" value="Enviar" autofocus>
				<input type="reset" class="formButton" name="Cancelar" value="Cancelar" >
			</div>
		</form>
		<?php 
			echo "<span id='idGeneral' hidden>" . $mi_factura . "<span>";
		?>
	</section>
<script> actGranTotal(); </script>
<script src="formSubmit.js"></script>