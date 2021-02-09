<?php
if (isset($_POST[$iduser])) {
    $delete = mysqli_query($connect, "DELETE FROM USUARIO WHERE ID_Usuario=" . $iduser) or die(mysqli_error());
    if ($delete) {
        echo  "<script>
                alert('Usuario borrado con exito');
                window.location= 'account.php'
            </script>";
             } else {
                echo "<script>
                alert('Error. No se pudo Borrar!');
                window.location= 'account.php'
            </script>";
    }
}

?>