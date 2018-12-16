<?php

$mi_consulta="SELECT proveedor_id, nombre, rfc
				FROM proveedor
				ORDER BY nombre ASC";				
$consulta2="SELECT nombre, producto_id, precio 
				FROM PRODUCTO
				ORDER BY nombre";
$result=bd_consulta($mi_consulta);
$result2=bd_consulta($consulta2);

?>

	<section id="form_box">	
		<header id="header_form"> Agregar una factura</header>
		<form action="compra_procesa.php" name="miformulario" id="miformulario" method="get">   		 
	
			<div class="myField">				
				<label for="proveedor"> Proveedor: </label>
				<select id="proveedor" name="proveedor" class="largo"
													onchange="actualizaRfc();"> 
					<option value="-1"></option>
				<?php while($row = mysqli_fetch_assoc($result)) 
				{					
					echo '<option mi_rfc= "'.$row["rfc"].'" value="'.
											$row["proveedor_id"].'">';
					echo $row["nombre"];
					echo '</option>';
				} ?>	
				</select>
			</div>	
			
			<div class="myField">
				<label for="fecha"> Fecha local: </label>
				<input type="date" class="corto" name="fecha" id="fecha"  placeholder="Fecha" required> 
			</div>	
			<div class="myField">
				<label for="folio"> Folio: </label>
				<input type="number" class="extracorto"  name="folio" id="folio"  min="0" 
																					required> 
			</div>	
			<div class="myField">				
				<label for="rfc"> RFC: </label>
				<input type="text" class="corto" name="rfc" id="rfc"  > 							  			  
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
				for($i=1;$i<=5;$i++)  { 
				
				echo '<tr>';
				echo '<td> <input type="text" value="'.$i.'" readonly /> </td>';
				echo '<td> <input type="number" min="1"  value="1" name="cantidad'.$i.'" 
							id="cantidad'.$i.'" onchange="actualiza('.$i.');"/>	</td> ';  
				echo '<td> <select name="producto'.$i.'" id="producto'.$i.'" onchange="actualizaPrecio('.$i.');"/> ';
				echo '<option mi_precio="0" value="-1"></option>';
				mysqli_data_seek($result2, 0);
				while($row = mysqli_fetch_assoc($result2)) 
				{					
					echo '<option mi_precio= "'.$row["precio"].'" value="'.
											$row["producto_id"].'">';
					echo $row["nombre"];
					echo '</option>';
				}						
				echo '</select>	</td>';	 
				echo '<td> <input type="number" min="0" value="0.00"  id="precio'.$i.'" 
							name="precio'.$i.'"  onchange="actualiza('.$i.');"/> </td>';
				echo '<td> <input type="text"  readonly value="0.00"  id="subtotal'.$i.'" /> </td>';					
				echo '</tr>';
				
				 } ?>

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
	</section>

<script src="formSubmit.js"></script>
