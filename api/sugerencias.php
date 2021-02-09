<?php include ("../includes/connectionBD.php");?>

<?php
$libros;
$sql = mysqli_query($connect, "SELECT * FROM LIBRO ");
while ($row = mysqli_fetch_assoc($sql)) {
    $libros[] = $row['Titulo'];
}

// obtener consulta
$q = $_REQUEST['q'];

$sugerencia = "";

// obtener sugerencias
function quitar_tildes($cadena)
{
    $cadBuscar = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú");
    $cadPoner = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U");
    $cadena = str_replace($cadBuscar, $cadPoner, $cadena);
    return $cadena;
}
if ($q !== "") {
    foreach ($libros as $libro) {
        $qLowerTilde= strtolower(quitar_tildes($q)); // nos pasa todas las letras a mínusculas
        $libroLowerTilde= strtolower(quitar_tildes($libro));
        if (strpos($libroLowerTilde, $qLowerTilde) !== false) {
            if ($sugerencia === "") { // si de momento no hay ninguna sugerencia, nos enseñará la primera.
                $sugerencia = $libro ;
            } else {
                $sugerencia .= ", $libro "; // si ya hay alguna sugerencia, nos concatenará con la siguiente.
            }
        }
    }
}
if ($sugerencia === "") {
    echo "No hay sugerencias";
} else {
    echo $sugerencia;
}