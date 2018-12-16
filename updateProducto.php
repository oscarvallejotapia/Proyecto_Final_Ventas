<?php
  include "funciones.php";
  include "cabecera.php";
  $id=$_GET['producto_id'];

  $consulta = "SELECT * FROM producto WHERE producto_id ='$id'";
  $result=bd_consulta($consulta);
 ?>


 <section id="listado">
 	<header id="header_form"> Modificar almacen</header>

 	<form action="modifiProducto.php" method="post">
    <?php
      if ($row = mysqli_fetch_assoc($result)) {

        echo '
        <input type="text" name="id" id="id" value= "'.$row['producto_id'].'" required style = "display : none;">

        <div class="myField">
   				<label for="desc"> Descripción: </label>
   				<input type="text" name="desc" id="desc" value= "'.$row['nombre'].'" required>
   			</div>

   			<div class="myField">
   				<label for="precio"> Precio: </label>
   				<input type="text" name="precio" id="precio" value= "'.$row['precio'].'" required>
   			</div>

   			<div class="myField">
   				<label for="cant"> Cantidad: </label>
   				<input type="text" name="cant" id="cant" value= "'.$row['cantidad'].'" required>
   			</div>';
      }
    echo '<div class="myField">
        <input type="submit" class="formButton" value="Modificar" autofocus>
      </div>';
     ?>

 	</form>

 </section>
