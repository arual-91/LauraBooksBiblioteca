<?php
if (isset($_POST[$idBook])) {
    $delete = mysqli_query($connect, "DELETE FROM PRESTAMO WHERE ID_Libro =" . $idBook) or die(mysqli_error());
    if ($delete) {
        echo "<script>
                alert('Borrado con exito');
                window.location= 'account.php'
            </script>";
    } else {
        echo "<script>
                   alert('Error. No se pudo borrar el libro!');
                  window.location= 'account.php'
              </script>";
    }
}
?>
