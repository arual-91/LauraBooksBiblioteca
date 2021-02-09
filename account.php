<!DOCTYPE html>
<html>
    <!-- HEAD -->
    <?php include "includes/head.php";?>
	<body>
        <!-- HEADER -->
		<?php include "includes/header.php";?>
		<!-- CUERPO -->
		<?php
        if (isset($_SESSION['user'])) {
            if ($_SESSION['idRol'] == 2) {
                include "includes/account/sesionAdmin.php";
            }
            if ($_SESSION['idRol'] == 1) {
                include "includes/account/sesionUsuario.php";
            }  
        } else {
            /* FORMULARIO LOGIN */
            include "includes/account/form-login.php";    
        }  
        ?>
        <!-- FOOTER -->
		<?php include "includes/footer.php";?>
	</body>
</html>

