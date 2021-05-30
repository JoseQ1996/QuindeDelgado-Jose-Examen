<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
	$isbn=$_POST['isbn'];
	$numpag=$_POST['num_pag'];
    $sql="INSERT into libro (lib_codigo,lib_nombre,lib_isbn,lib_num_pag)
			values (0,'$nombre','$isbn','$numpag')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado El libro correctamente</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    //cerrar la base de datos
    $conn->close();
    echo "<a  href='../vista/crear.php?nombre=".$nombre."'>Regresar</a>";

    ?>
</body>

</html>