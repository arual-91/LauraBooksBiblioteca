<?php 

//SQL CONSULTA usuario LOGUEADO
$query = "SELECT * FROM USUARIO WHERE ID_Usuario=".$_SESSION['idUsuario'];
$sqlUser = mysqli_query($connect, $query);

//MOSTRAMOS INFORMACIONDEL USUARIO LOGUEADO
while ($row = mysqli_fetch_assoc($sqlUser)) {
    echo '  <div class="MiPerfil">
                <h3> Bienvenid@ '.$row['Nombre'].' '.$row['Apellido'].'</h3>
                <br><h4>DATOS:</h4>
                <ul>
                    <li><b>Fecha Nacimiento: </b>'.$row['Fecha_Nacimiento'].'</li>
                    <li> <b>Email: </b>' .$row['Email']. '</li>
                    <li><b>Direccion: </b>'.$row['Direccion'].', '.$row['Codigo_Postal'].', '.$row['Poblacion'].'</li>
                </ul>
            </div>';
}
