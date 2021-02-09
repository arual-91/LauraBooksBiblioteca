                <!-- validarRegistro() va va a js/main.js -->
<form action='' method='POST' class=register id="register-form" onsubmit="return ValidarRegistro()">
	<input placeholder='Nombre' type="text" name="nombre" class="nombre" required>
	<input placeholder='Apellidos' type="text" name="apellidos" class="apellidos" required><br>
	<input placeholder='DNI' type="text" name="dni" class="dni" required>
	<input type="date" name="fechaNacimiento" value="2000-01-01" class="fechaNacimiento" required>
	<input placeholder='Telefono' type="text" name="telefono" class="dni" required>
	<input placeholder='Codigo Postal ' type="number" name="codigoPostal" class="codigoPostal"  required><br>
	<input placeholder='Direccion' type="text" name="direccion" class="direccion" required>
	<input placeholder='Poblacion' type="text" name="poblacion" lass="poblacion" required><br><br> 
	<input placeholder='Email' type="email" name="email" class="email" required>
	<input placeholder='Contraseña' type="password" name="passwd" class="passwd" required>
	<input placeholder='Confirmar Contraseña' type="password" name="passwd2" class="passwd2" required><br>
	<input type="submit" name="add" class="boton" value="Registrarse"> 
</form>
<p id="erroRegister"></p>
<!-- BOTON SALIR DE REGISTRO -->
<div class="botonInicio"><br>
	<a href="account.php"><input type="submit" value="Salir" class="boton"></a>
</div>

