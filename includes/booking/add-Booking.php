<?php
if (isset($_POST[$idBook])) {
        $insert = mysqli_query($connect, "INSERT INTO PRESTAMO VALUES
                                            (curdate(),(select DATE_ADD(curdate(), INTERVAL 7 DAY))," . $_SESSION['idUsuario'] . "," . "$idBook)") 
                                            or die(mysqli_error());
        if ($insert) {
            echo "  <script>
                        alert('Reservado Con exito');
                        window.location= 'booking.php'
                    </script>";
        } else {
            echo '<div style="background-color: red;">Error. No se pudo reservar!</div>';
        }
    
}
?>