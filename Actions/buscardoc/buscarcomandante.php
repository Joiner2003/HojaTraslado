<?php
function Conexion(){
    $conn = mysqli_connect("localhost", "root", "Otatraslado2022", "sena", "3307");

return $conn;

}	


function getListaComandante(){
    $conn = Conexion();
    $query = 'SELECT * FROM Ota_Usuario WHERE Tipo_U = 2';

    $result = mysqli_query($conn,$query);
    $listas = '<option value="0"> Seleccione Comandante </option>';

    while ($row = mysqli_fetch_array($result, mysqli_fetch_assoc)) {
        $listas .= "<option value= '$row[IdUsuario]'> $row[Us_Nom1] $row[Us_Ape1] $row[Us_Ape2] </option>";
    }
    return $listas;
}

echo getListaComandante();

?>

