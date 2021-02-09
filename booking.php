<!DOCTYPE html>
<html>
	<!-- HEAD -->
    <?php include "includes/head.php";?>
	<body>
        <!-- HEADER -->
	    <?php include "includes/header.php";?>
 	    <!-- CUERPO -->
    	<h1>RESERVA</h1>
    	 <div class="filterSearch">	
        	<form action=''  method='POST'>
        	    <!-- mostrarSugerencias va a js/main.js -->
        		<input class="searchtxt" type='text' name='busqueda' onkeyup="mostrarSugerencias(this.value)"></input>
					<?php include "includes/genero.php";?>
        		<input type='submit' value='Aceptar' class="boton">
        	</form>
        	<p>Sugerencias: <span id="salida" style="font-weight:bold"></span></p>
       	</div> 
		<?php
            if (isset($_SESSION['user'])) {    
                include "includes/booking/searchBooks.php";
            } else {     
                header('Location: account.php');      
            }
        ?> 
        <!-- FOOTER -->
		<?php include "includes/footer.php";?>
	</body>
</html>