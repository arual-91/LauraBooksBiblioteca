 <!-- validarLogin va a js/main.js -->
<form class="login" id="login-form" onsubmit="return validarLogin()">
	<h1>LOGIN</h1>
	<!-- Username -->
	<div class="email">
		<input type="email" name="email" placeholder='Email' required><br>
	</div>
	<!-- Password -->
	<div class="contraseña">
		<input type="password" name="passwd"  placeholder='Contraseña' required>
	</div>
	<!-- Submit Button -->
	<input type="submit" value="Iniciar Sesion" name="login" class="boton">

	<!-- Registro -->
	<div id="lower" class="linkRegistro">
		<label >Registrate <a href="register.php"> aquí</a></label>
	</div>
</form>
<br><br>
<p id="erroLogin"></p>
