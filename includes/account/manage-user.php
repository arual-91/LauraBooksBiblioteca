<?php
//SQL CONSULTA usuarios
$query = "SELECT * FROM USUARIO WHERE ID_Usuario!=".$_SESSION['idUsuario'];
$sqlUser = mysqli_query($connect, $query);
$numfilas = mysqli_num_rows($sqlUser);

//mostramos los datos de acuerdo con la sql selecionada
if ($numfilas == 0) {
    echo '<br><table>
        	       <tr><th>No hay datos.</th></tr>
            </table>';
} else {
    /*  CABECERA TABLA */
    echo '<br><table>
        	       <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimiento</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>ID Usuario</th>
                        <th>ROL</th>
        	       </tr> ';
    /*  FILAS DE LA TABLA */ 
    while ($row = mysqli_fetch_assoc($sqlUser)) {
        $iduser =$row['ID_Usuario'] ;
        echo '<tr>
					<td>' . $row['Nombre'] . '</td>
                    <td>' . $row['Apellido'] . '</td>
                    <td>' . $row['Fecha_Nacimiento'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>' . $row['Direccion'].', '. $row['Codigo_Postal'].', '. $row['Poblacion']. '</td>
                    <td>' .$iduser . '</td>
                    <td>' . $row['ID_Rol'] . '</td>
                    <td>
                        <form action="account.php" method="POST">
                            <button class="btnDelete" name="'. $iduser .'">Borrar</button>
                        </form>
                    </td>
		      </tr>';
              include "delete-user.php";
    }
    echo '</table>';
}

?>