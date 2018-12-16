<?php
  include "funciones.php";
  include "cabecera.php";
  $id=$_GET['usuario_id'];

  $consulta = "SELECT * FROM usuario WHERE usuario_id ='$id'";
  $result=bd_consulta($consulta);
 ?>

 <section id="listado">
 	<header id="header_form"> Modificar usuario</header>

 	<form action="modifiUsuario.php" method="post">
    <?php
      if ($row = mysqli_fetch_assoc($result)) {
        echo '
        <input type="text" name="id" id="id" value = "'.$row['usuario_id'].'" required style="display:none;">
        <div class="myField">
   				<label for="nombre"> Nombre completo: </label>
   				<input type="text" name="nombre" id="nombre" value = "'.$row['nombre_completo'].'" required>
   			</div>

   			<div class="myField">
   				<label for="usuario"> Usuario: </label>
   				<input type="text" name="usuario" id="usuario" value = "'.$row['usuario'].'" required>
   			</div>

   			<div class="myField">
   				<label for="pass"> Password: </label>
   				<input type="text" name="pass" id="pass" value = "'.$row['password'].'" required>
   			</div>
         <div class="myField">
           <label for="tipo"> Rol: </label>
           <select class="" name="tipo">
             <option value="Administrador" disabled>Seleccionar</option>
             <option value="Administrador">Administrador</option>
             <option value="Cliente">Cliente</option>
           </select>
         </div>';
      }
      echo '<div class="myField">
 				<input type="submit" class="formButton" value="Modificar" autofocus>
 			</div>';
     ?>




 	</form>

 </section>
