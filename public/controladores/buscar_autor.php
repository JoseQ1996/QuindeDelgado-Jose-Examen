<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $autor = $_GET['autor'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM autor WHERE  aut_nombre='$autor'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Nombre</th>
 <th>Nacionalidad</th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['aut_nombre'] . "</td>";
 echo " <td>" . $row['aut_nacionalidad'] ."</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen autores registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>