<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agregar Capitulo</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
<?php
    include '../../config/conexionBD.php';
    $autor= $_POST["autor"];
    $sql = "SELECT aut_codigo FROM autor WHERE aut_nombre='$autor'";
    echo($sql);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codAut=$row['aut_codigo'];
    } else {
        echo " No existe Autor";
    }

    $conn->close();
    ?>
      <?php
    include '../../config/conexionBD.php';
    $codLib=$_POST['codlib'];
    $sql = "SELECT lib_nombre FROM libro WHERE lib_codigo='$codLib'";
    echo($sql);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre=$row['lib_nombre'];
    } else {
        echo " No existe libro";
    }

    $conn->close();
    ?>
    <?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $titCap = isset($_POST["titulo_cap"]) ? mb_strtoupper(trim($_POST["titulo_cap"]), 'UTF-8') : null;
    $numCap=$_POST['num_cap'];
    $codLib=$_POST['codlib'];
            $sql="INSERT into capitulo (cap_codigo,cap_numero,cap_titulo,cap_lib_codigo,cap_aut_codigo)
			values (0,'$numCap','$titCap','$codLib','$codAut')";
echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha ingresado el Capitulo</p>";
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

	

	