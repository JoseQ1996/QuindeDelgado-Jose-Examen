<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $libro = $_GET['libro'];
 //echo "Hola " . $cedula;

 $sql = "SELECT lib_codigo FROM libro WHERE  lib_nombre='$libro'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 echo  $row['lib_codigo'] ;
 }
 } else {
 echo "No existe Libro";
 }

 $conn->close();

?>