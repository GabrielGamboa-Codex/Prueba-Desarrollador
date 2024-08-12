<div class="main-container">

    <form class="box login" action="" method="POST" autocomplete="off" >
	<img src="<?php echo APP_URL; ?>app/views/img/logo.png" alt="Bulma" width="112" height="28">
		<h2 class="title is-3 has-text-centered is-uppercase">LOGIN</h2>

		<div class="field">
			<h4>Usuario</h4>
			<div class="control">
			    <input class="input is-primary is-medium" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<h4>Clave</h4>
		  	<div class="control">
		    	<input class="input is-primary is-medium" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-primary is-medium">Iniciar sesion</button>
		</p>

	</form>
</div>

<?php
	if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
		$insLogin->iniciarSesionControlador();
	}
?>