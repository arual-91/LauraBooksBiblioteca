<form class="controlLibro" id="addBook-form" onsubmit="return ValidarAddBook()">
	<input placeholder='Titulo' type="text" name="titulo"  required>
	<input placeholder='Autor' type="text" name="autor" required>
		<?php include "includes/genero.php";?>
	<input type="date" name="fechaPublicacion" value="2000-01-01" class="inputFechaPublicacion" required>
    <input placeholder='Editorial' type="text" name="editorial"  required>
   	<input type="submit" name="addBook" class="boton" value="Añadir Libro"> 
</form>
 
 
<form class="controlLibro" id="deleteBook-form" onsubmit="return ValidarDeleteBook()">
		<label for="matricula">ID BOOK : </label>
		<input type="text" name="idBook" required> 
		<input type="submit" name="deleteBook" class="boton" value="Borrar Libro">		
</form>
  <?php include "showBooks.php";?>