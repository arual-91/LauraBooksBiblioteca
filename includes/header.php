<?php  session_start(); ?>
<!-- CABECERA -->
<header>
    <img src="img/logo.png">  
    <h1 class="titulo">LAURA BOOKS</h1>
</header>
<!-- NAVEGADOR -->
<div class="menu">
    <a href="./index.php" >INICIO</a>
    <a href="./booking.php" >RESERVAR</a>
    <a href="./contact.php" >CONTACTO</a>
    <?php 
    if (isset($_SESSION['user'])) {  ?>
    	<a href="./account.php" >MI CUENTA</a>
     <?php  
    }else{  ?>
        <a href="./account.php" >LOGIN</a>      
   <?php 
    }  ?>
   
</div>