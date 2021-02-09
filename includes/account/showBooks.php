<?php
$query = "SELECT * FROM `LIBRO` ";
$sqlLibro = mysqli_query($connect, $query);
$numfilas = mysqli_num_rows($sqlLibro);

if ($numfilas == 0) {
    echo '<br><table>
                <tbody id="tableBook">
        	       <tr><th>No hay datos.</th></tr>
                </tbody>
            </table>';
} else {
    /*  CABECERA TABLA */
    echo '<br><table>
                <tbody id="tableBook">
        	       <tr>
                        <th>Titulo</th>
                        <th>Editorial</th>
                        <th>Genero</th>
                        <th>Fecha Publicacion</th>
                        <th>Autor</th>
                        <th>ID LIBRO</th>
        	       </tr>';
    /*  FILAS DE LA TABLA */
    while ($row = mysqli_fetch_assoc($sqlLibro)) {
        $idBook = $row['ID_Libro'];
        echo '<tr>
					<td>' . $row['Titulo'] . '</td>
                    <td>' . $row['Editorial'] . '</td>
                    <td>' . $row['Genero'] . '</td>
                    <td>' . $row['Fecha_Publicacion'] . '</td>
                    <td>' . $row['Autor'] . '</td>
                    <td>' . $idBook . '</td>
            </tr>';
    }
    echo ' </tbody>
         </table>';
}

?>