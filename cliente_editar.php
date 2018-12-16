<?php
  include "funciones.php";
  include "cabecera.php";
  $id=$_GET['cliente_id'];

  $consulta = "SELECT * FROM cliente WHERE cliente_id ='$id'";
  $result=bd_consulta($consulta);
 ?>


 <section id="listado">
 	<header id="header_form">  Modificacion de clientees</header>

 	<form action="cliente_modificar.php" method="post">

 				<?php
          if ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="text" name="id" id="id" value="'.$row['cliente_id'].'" required style="display : none">';

            echo '<div class="myField">';
              echo '<label for="cliente"> Nombre del cliente: </label>';
     				     echo '<input type="text" name="provedor" id="provedor" value="'.$row['nombre'].'" required>';
            echo '</div>';

            echo '<div class="myField">';
              echo '<label for="rfc"> RFC del Cliente: </label>';
     				  echo '<input type="text" name="rfc" id="rfc" value="'.$row['rfc'].'" required>';
            echo '</div>';

            echo '<div class="myField">';
       				echo '<label for="tel"> Telefono: </label>';
       				echo '<input type="text" name="tel" id="tel" value = "'.$row['telefono'].'" required>';
       			echo '</div>';

            echo '<div class="myField">';
       				echo '<label for="mail"> Correo: </label>';
       				echo '<input type="text" name="mail" id="mail" value = "'.$row['correo'].'" required>';
       			echo '</div>';
          }
          echo '<div class="myField">
     				<input type="submit" class="formButton" value="Modificar" autofocus>
     			</div>';
         ?>

 	</form>

 </section>
