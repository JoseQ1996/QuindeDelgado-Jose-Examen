<?php

$db_servername = "localhost:3307";//Se pone la direccion de localhost para conexion de base
$db_username = "root";
$db_password = "";//Se pone la contraseña dependiendo si tiene o no
$db_name = "libreria";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
$conn->set_charset("utf8");

# Probar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    /*echo "<p>Conexión exitosa!! :)</p>";*/
}
?>