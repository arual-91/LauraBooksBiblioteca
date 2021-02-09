<!DOCTYPE html>
<html>
	<!-- HEAD -->
    <?php include "includes/head.php";?>
	<body>
        <!-- HEADER -->
	    <?php include "includes/header.php";?>
 	    <!-- CUERPO -->
		<div class="cuerpoContacto">
            <div class="info">
            <br>
                <h1>CONTACTO</h1>
                    <p><b>Tlf:</b> 555 555 555<br>
                    <b>Correo:</b> lauraBooks@gmail.com<br>
                    <b>Direccion:</b> Av/ Gaspar Bennazar, 16, Palma de Mallorca </p>
               	<br>
               	<h1>HORARIO</h1>
                    <p><b>Lunes - Viernes:</b> 10:00 a 20:00 <br>
                    <b>Sabado - Domingo:</b> Cerrado</p>     
            </div>
            <br><br>
			<form action='' method='POST' class="sugerencia"  name="sugerencia">
				<h1>SUGERENCIA:</h1>
            	<label>Nombre: </label><input type="text" name="nombreSugerencia" required > 
            	<textarea placeholder='Escribe aquí tu sugerencia' name="txtSugerencia" rows="10" cols="60"></textarea>
            	<input type="submit" name="botonEnviar" class="boton" value="Enviar Sugerencia"> 
        	</form>
            <?php include "includes/contact/mailing.php";?>
        </div>
        <!-- FOOTER -->
		<?php include "includes/footer.php";?>
	</body>
</html>