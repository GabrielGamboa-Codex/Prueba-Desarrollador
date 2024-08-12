<div class="container is-fluid mb-6">
	<h1 class="title has-text-centered">Ingrese un Producto</h1>
	<h3 class="has-text-centered">Llene los Campos</h3>
</div>

<div class="container pb-6 pt-6">

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" >

		<input type="hidden" name="modulo_usuario" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Nombres</h4>
				  	<input class="input is-large" type="text"  value="<?php echo $_SESSION['nombre']?>" id="usuario_nombre"  maxlength="40" required  disabled>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Apellidos</h4>
				  	<input class="input is-large" type="text" value="<?php echo $_SESSION['apellido']; ?>" id="apellido"  maxlength="40" required disabled>
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<h4>Nombre Producto</h4>
				  	<input class="input is-large" type="text"  value=""  id="producto1" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<h4>Cantidad</h4>
				  	<input class="input is-large" type="number"  value="" id="cantidad1" maxlength="70" >
				</div>
		  	</div>
		</div>
		
		<p class="has-text-centered">
			<button type="reset" class="button is-link is-light is-rounded is-medium">Limpiar</button>
			<button type="submit" class="button is-info is-rounded is-medium" onclick="Mostrar()">Guardar</button>
		</p>
        <script src="../js/ajax.js"></script>
	</form>
</div>