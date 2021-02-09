<?php
    // ASIGNAMOS A $txtInput el texto a buscar en el filtro si no hay nada dara vacio
    if (isset($_POST['busqueda'])) {
        $txtInput = $_POST['busqueda'];     
    }else{
        $txtInput = "";
    }
   
    // ASIGNAMOS A $GeneroInput el genero a buscar en el filtro si no hay nada dara vacio
    if(isset($_POST['genero'])){
        $GeneroInput = $_POST['genero'];
        if($GeneroInput =='todos'){
            $GeneroInput = "";
        }
    }else{
        $GeneroInput = "";
    }
    
    // SQL de los libro con los filtros y si no hay filtro se mostrarian todos.
    $query = "SELECT * FROM `LIBRO` WHERE Titulo LIKE '%".$txtInput."%' AND Genero LIKE '%".$GeneroInput."%';";
    $sqlLibro = mysqli_query($connect, $query);
    $numfilas = mysqli_num_rows($sqlLibro);
    if ($numfilas == 0) {
        echo '<br><table>
        	       <tr><th>No hay datos.</th></tr> 
            </table>';
    } else {
        /*  CABECERA TABLA */
         echo '<br><table>
        	       <tr>
                        <th>Titulo</th>
                        <th>Editorial</th>
                        <th>Genero</th>
                        <th>Fecha Publicacion</th>
                        <th>Autor</th>
                        <th>Reservar</th>
        	       </tr> ';
         /*  FILAS DE LA TABLA */
        while($row = mysqli_fetch_assoc($sqlLibro)) {
            $idBook = $row['ID_Libro']; 
            /* SQL PARA SABER DISPONIBILIDAD */
            $sqlprestamo = mysqli_query($connect, "SELECT * FROM PRESTAMO WHERE ID_Libro=" . $idBook); 
            echo '<tr>
					<td>' . $row['Titulo'] . '</td>
                    <td>' . $row['Editorial'] . '</td>
                    <td>' . $row['Genero'] . '</td>
                    <td>' . $row['Fecha_Publicacion'] . '</td>
                    <td>' . $row['Autor'] . '</td>';
            if (mysqli_num_rows($sqlprestamo) == 0) { // si esta disponible muestra boton de reservar
                echo '<td>  <form action="" method="POST">
                                <button class="btnBooking" name="'.$idBook.'" >Resevar</button>
                            </form>
                    </td>';
                include "add-Booking.php";
            }else{
                echo '<td><p><b>No disponible</b></p></td>';
            }
            echo '</tr>';
        }
        echo '</table>';    
    }

?>
