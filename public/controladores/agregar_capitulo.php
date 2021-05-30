<?php 
    
	$conexion=mysqli_connect('localhost:3307','root','','libreria');
    include '../../../config/conexionBD.php';
	$nomLib=$_POST['nomLib'];
    $sql1 = "SELECT lib_codigo FROM libro WHERE lib_nombre='$nomLib'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         $codLib= $row["lib_codigo"] ;
        } else {
            $codLib= null ;
        }
    $autNom=$_POST['autor'];
    $sql2 = "SELECT aut_codigo FROM autor WHERE aut_nombre='$autNom'";
    $result1 = $conn->query($sql2);
    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $codAut= $row1["aut_codigo"] ;
    } else {
        $codAut= null ;
    }
	$numCap=$_POST['num_cap'];
	$titCap=$_POST['titulo_cap'];

	$sql="INSERT into capitulo (cap_codigo,cap_numero,cap_titulo,cap_lib_codigo,cap_aut_codigo)
			values (0,'$numCap','$titCap','$codLib','$codAut')";
	echo mysqli_query($conexion,$sql);
 ?>