<div class="container is-fluid mb-6">
	<?php 

		$id=$insLogin->limpiarCadena($url[1]);

		if($id==$_SESSION['id']){ 
	?>
	<h3>Mi cuenta</h3>
	<h4>Actualizar cuenta</h4>
	<?php }else{ ?>
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Actualizar usuario</h2>
	<?php } ?>
</div>
<div class="container pb-6 pt-6">
	<?php
	
		include "./app/views/inc/btn_back.php";

		$datos=$insLogin->seleccionarDatos("Unico","usuario","usuario_id",$id);

		if($datos->rowCount()==1){
			$datos=$datos->fetch();
	?>

	<h1 class="title has-text-centered"><?php echo $datos['usuario_nombre']." ".$datos['usuario_apellido']; ?></h1>

	<h2 class="has-text-centered pb-6"><?php echo "<strong>Usuario creado:</strong> ".date("d-m-Y  h:i:s A",strtotime($datos['usuario_creado']))." &nbsp; <strong>Usuario actualizado:</strong> ".date("d-m-Y  h:i:s A",strtotime($datos['usuario_actualizado'])); ?></h2>

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" >

		<input class="input is-large"  cltype="hidden" name="modulo_usuario" value="actualizar">
		<input class="input is-large" type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Nombres</h4>
				  	<input class="input is-large"  type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" value="<?php echo $datos['usuario_nombre']; ?>" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Apellidos</h4>
				  	<input class="input is-large"  type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" value="<?php echo $datos['usuario_apellido']; ?>" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Usuario</h4>
				  	<input class="input is-large" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" value="<?php echo $datos['usuario_usuario']; ?>" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Correo</h4>
				  	<input class="input is-large"  type="email" name="usuario_email" maxlength="70" value="<?php echo $datos['usuario_email']; ?>" >
				</div>
		  	</div>
		</div>
		<br><br>
		<p class="has-text-centered">
			SI desea actualizar la clave de este usuario por favor llene los 2 campos. Si NO desea actualizar la clave deje los campos vacíos.
		</p>
		<br>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Nueva clave</h4>
				  	<input class="input is-large"  type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Repetir nueva clave</h4>
				  	<input class="input is-large"  type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		</div>
		<br><br><br>
		<p class="has-text-centered">
			Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
		</p>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Usuario</h4>
				  	<input class="input is-large"  type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Clave</h4>
				  	<input class="input is-large"  type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button class="button is-large is-success" type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
	</form>
	<?php
		}else{
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>