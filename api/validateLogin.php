<?php
include ("../includes/connectionBD.php");

$email = $_POST['email'];
$paswd = $_POST['passwd'];
$result=false;
$message="";
if (isset($email) && isset($paswd)) {
    
    if ($connect) {
        $sql = mysqli_query($connect, "SELECT * FROM USUARIO WHERE Email='$email'");
        if (mysqli_num_rows($sql) == 0) {
            $message= "ERROR de Contraseña o Usuario";
        } else {
            $row = mysqli_fetch_assoc($sql);
            $hash  = $row['Contraseña'];
            $nameUsuario  = $row['Nombre'];
            $idUsuario = $row['ID_Usuario'];
            $idRol = $row['ID_Rol'];
            if (password_verify($paswd, $hash)) {
                session_start();
                $_SESSION['user'] = $nameUsuario;
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['idRol'] = $idRol;
                $result=true;
             //   header('Location: account.php');
                /*  echo "password valid";*/
            } else {
                $message= "ERROR de Contraseña o Usuario";
                /* echo '<script language="javascript">alert("Error de contraseña y usuario");</script>';*/
            }
        }
    }else{
        $message= 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
    }
}else{
    $message="Email y/o contraseña vacia";
}

$json = json_encode(array('result' => $result, 'message' => $message), JSON_FORCE_OBJECT);
echo $json;
