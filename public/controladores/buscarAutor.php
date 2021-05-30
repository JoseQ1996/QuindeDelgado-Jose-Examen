
<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $autor = $_GET['autor'];
 //echo "Hola " . $cedula;

 $sql = "SELECT lib_nombre,cap_numero,cap_titulo FROM  autor a, capitulo c, libro l 
 WHERE a.aut_codigo=c.cap_aut_codigo AND l.lib_codigo=c.cap_lib_codigo AND  a.aut_nombre='$autor'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 
 echo " <table style='width:100%'>
 <tr>
 <th>Nombre Libro</th>
 <th>Numero Capitulo</th>
 <th>Titulo Capitulo</th>
 
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['lib_nombre'] . "</td>";
 echo " <td>" . $row['cap_numero'] ."</td>";
 echo " <td>" . $row['cap_titulo'] ."</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen capitulos registrados en libros de este Autor </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?> 