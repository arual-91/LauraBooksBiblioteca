<?php
include ("../includes/connectionBD.php");
$result=false;
$message="";

    $nombre = $_POST["nombre"];
    $autor = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $codigoPostal = $_POST["codigoPostal"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];
    $poblacion = $_POST["poblacion"];
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    $passwd2 = $_POST["passwd2"];
    $hashpasswd = password_hash($passwd, PASSWORD_DEFAULT);
    if ($connect) {
        $sql = mysqli_query($connect, "SELECT * FROM USUARIO WHERE Email='$email'");
        if (mysqli_num_rows($sql) == 0) {
            if ($passwd == $passwd2) {
                $insert = mysqli_query($connect, "INSERT INTO USUARIO (Nombre, Apellido, Fecha_Nacimiento, Email, Direccion, Poblacion, Codigo_Postal, Contraseña, ID_Rol, DNI)
                                                  VALUES ('$nombre','$autor', '$fechaNacimiento', '$email', '$direccion', '$poblacion','$codigoPostal','$hashpasswd',1,'$dni')") or die(mysqli_error());
               
                if ($insert) {
                    $result=true;
                        
                } else {
                    $message= 'ERROR: No se pudo guardar los datos!';
                }
            } else {
                $message= 'ERROR: La contraseña no coinciden';
            }
        } else {
            
            $message= 'ERROR: El email ya existe';
        }
    }


$json = json_encode(array('result' => $result, 'message' => $message), JSON_FORCE_OBJECT);
echo $json;
?>