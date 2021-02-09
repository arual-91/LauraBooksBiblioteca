<?php
//SQL CONSULTA RESERVAS
$query = 'SELECT Fecha_Prestamo, Fecha_Devolución, p.ID_Usuario, concat(u.Nombre," ",u.Apellido) "Nombre", p.ID_Libro, l.Titulo 
            FROM PRESTAMO p 
            JOIN USUARIO u on u.ID_Usuario=p.ID_Usuario 
            JOIN LIBRO l on l.ID_Libro=p.ID_Libro;';
$sql = mysqli_query($connect, $query); 

//mostramos los datos de acuerdo con la sql selecionada
if (mysqli_num_rows($sql) == 0) {
    echo '<br><table>
    	       <tr><th>No hay datos.</th></tr>
          </table>';
                        }else {  
    /*  CABECERA TABLA */ 
    echo '<br><table>
                <tr>
                    <th>Fecha Prestamo</th>
                    <th>Fecha Devolucion</th>
                    <th>Titulo</th>';
    if ($_SESSION['idRol'] == 2) {  // solo si el usuario es admin mostrara la siguiente info
    echo '          <th>ID LIBRO</th>
                    <th>Nombre</th>
                    <th>ID USUARIO</th>
                    <th>BORRAR</th>';
    }
    echo '      </tr> ';
    
    /*  FILAS DE LA TABLA */ 
    while ($row = mysqli_fetch_assoc($sql)) {
        $idBook = $row['ID_Libro'];
        echo '  <tr>
					<td>' . $row['Fecha_Prestamo'] . '</td>
                    <td>' . $row['Fecha_Devolución'] . '</td>
                    <td>' . $row['Titulo'] . '</td>';

        if ($_SESSION['idRol'] == 2) {   // solo si el usuario es admin mostrara la siguiente info
            echo '
                    <td>' . $idBook . '</td>
                    <td>' . $row['Nombre'] . '</td>
                    <td>' . $row['ID_Usuario'] . '</td>
                    <td>
                        <form action="" method="POST">  
                            <button class="btnDelete" name="'.$idBook.'">Borrar</button>
                        </form>
                    </td>
				</tr>';
                include "delete-booking.php";
        }
    }
    echo '</table>';
}