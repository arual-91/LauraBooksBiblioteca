<?php
include ("../includes/connectionBD.php");
$result=false;
$message="";

    $idBook = $_POST["idBook"];
    
    if ($connect) {
        $sql = mysqli_query($connect, "SELECT * FROM LIBRO WHERE ID_Libro='$idBook'");
        if (mysqli_num_rows($sql) != 0) {
            $delete = mysqli_query($connect, "DELETE FROM LIBRO WHERE ID_Libro =" . $idBook) or die(mysqli_error());
            
            if ($delete) {
                $result=true;
                
            } else {
                $message= "Error. No se pudo borrar el libro!";
            }
        } else {
            $message= "Error. el Libro no existe";
        }
    }

    $json = json_encode(array('result' => $result, 'message' => $message, 'id' => $idBook), JSON_FORCE_OBJECT);
    echo $json;

?>