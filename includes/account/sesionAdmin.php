<!-- MENU - MI CUENTA -->
<div class="tab">
	<button class="tablinks active" onclick="openMenu(event, 'perfil')">Mi Perfil</button> 
    <button class="tablinks" onclick="openMenu(event, 'manage-book')">Gestionar Libro</button>
    <button class="tablinks" onclick="openMenu(event, 'manage-booking')">Gestionar Reservas</button>
    <button class="tablinks" onclick="openMenu(event, 'manage-user')">Gestionar Usuarios</button>
</div>

<!-- Tab content -->
<div id="manage-book" class="tabcontent">
	<?php  include "manage-book.php"; ?>
</div>
<div id="manage-booking" class="tabcontent">
	<?php include "manage-booking.php"; ?>
</div>
<div id="perfil" class="tabcontent">
	<?php  include "perfil.php" ?>
</div>
<div id="manage-user" class="tabcontent">
	<?php  include "manage-user.php"; ?>
</div>

<!-- BOTON - CERRAR SESION -->
<a  href="includes/account/logout.php"><input  class="botonCloseSesion" type="submit" value="Cerrar Sesion"></a>
