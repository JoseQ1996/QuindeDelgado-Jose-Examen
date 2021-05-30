
   
    <?php 
    
	$conexion=mysqli_connect('localhost:3307','root','','libreria');
	$nombre=$_POST['nombre'];
	$isbn=$_POST['isbn'];
	$numpag=$_POST['num_pag'];

	$sql="INSERT into libro (lib_codigo,lib_nombre,lib_isbn,lib_num_pag)
			values (0,'$nombre','$isbn','$numpag')";
	echo mysqli_query($conexion,$sql);
 ?>