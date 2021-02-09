<?php
include ("../includes/connectionBD.php");
$result=false;
$message="";

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $fechaPublicacion = $_POST["fechaPublicacion"];
    $editorial = $_POST["editorial"];
    $idBook;
    
    if ($connect) {
        $sql = mysqli_query($connect, "SELECT * FROM LIBRO WHERE Titulo='$titulo'");
        if (mysqli_num_rows($sql) == 0) {
            $insert = mysqli_query($connect, "INSERT INTO LIBRO
                                                    VALUES (null,'$autor','$titulo', '$editorial','$genero','$fechaPublicacion')") or die(mysqli_error());
            if ($insert) {
                $result=true;
                $sqlID = mysqli_query($connect, "SELECT ID_Libro FROM LIBRO WHERE Titulo='$titulo'");
                while ($row = mysqli_fetch_assoc($sqlID)) {
                    $idBook = $row['ID_Libro'];
                    
                }
                
            } else {
                $message= "Error. No se pudo guardar los datos!";
            }
        } else {
            $message= 'Error. el Libro ya existe';
        }
    }

    
    $json = json_encode(array('result' => $result, 'message' => $message, 'titulo' => $titulo, 'autor' => $autor, 'genero' => $genero, 'fechaPublicacion' => $fechaPublicacion , 'editorial' => $editorial,'idBook' => $idBook), JSON_FORCE_OBJECT);
    echo $json;
?>