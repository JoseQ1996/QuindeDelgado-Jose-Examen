<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../../js/buscar_autor.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Crear Libro</title>



</head>

<body>
    <h1>
        <center> Agregar Libro</center>
    </h1>
  <form  id="formulario01" method="POST">
        <br>
        <label for="cedula">Nombre (*)</label>
        <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el titulo del libro" />
        <br><br>

        <label for="nombres">ISBN (*)</label>
        <input type="text" id="isbn" name="isbn" value="" placeholder="Ingrese el ISBN del libro ...
       " />
        <br><br>
        <label for="apellidos">Numero de Paginas (*)</label>
        <input type="text" id="num_pag" name="num_pag" value="" placeholder="Ingrese el numero de paginas ...
        " />
        <br><br>
        <button id="btnAgLibro">Agregar Libro</button>
        <br>
        
</form>

        <h2>
            <center> Capitulos</center>
        </h2>
        <br>
        
         <form  id="formulario02" method="POST"> 
         <input type="hidden" id="nomLib" name="nomlib" value=" " />     
        <label for="num_cap">Numero Capitulo (*)</label>
        <input type="text" id="num_cap" name="num_cap" value="" placeholder="...Ingrese el numero de Capitulo" disabled/>

        <label for="titulo_cap">Titulo Capitulo (*)</label>
        <input type="text" id="titulo_cap" name="titulo_cap" value=""
            placeholder="... Ingrese el titulo del capitulo" disabled/>

        <label for="autor">Autor (*)</label>

        <select class="select" id="autor" name="autor" onchange='buscarPorAutor()'>
            <?php
            include '../../config/conexionBD.php';
            $sql = "SELECT aut_nombre FROM autor ";
            $result = $conn->query($sql);   
            if ($result->num_rows > 0) {
    
                while ($row = $result->fetch_assoc()) {
                    echo " <option>".$row['aut_nombre']." </option>";
                }
            } else {
                echo " <option>".'sin registros'." </option>";
            }
    
            $conn->close();
            ?>
        </select>
        <br><br>
        </form>
        <div id="informacion1"><b></b></div>
        <br><br>
        <div id="informacion2"><b></b></div>
        <br><br>

        <button id="btnAgCap">Agregar Capitulo </button>
        <button id="btnFinalizar">Finalizar</button>
        <br><br>
    <br>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgLibro').click(function(){
			var datos=$('#formulario01').serialize();
            //alert(datos);                    
			$.ajax({
				type:"POST",
				url:"../controladores/agregar_libro.php",
				data:datos,
				success:function(r){
                    //alert(r);
					if(r==1){
						alert("Libro Ingresado");
                        document.getElementById("nomLib").value = document.getElementById("nombre").value;
                        $("#num_pag").prop("disabled", true);
                        $("#nombre").prop("disabled", true);
                        $("#isbn").prop("disabled", true);
                        $("#btnAgLibro").prop("disabled", true);
                        $("#num_cap").prop("disabled", false);
                        $("#titulo_cap").prop("disabled", false);

					}else{
						alert("No se inserto el Libro");
                       
					}
				}
			});
            return false;    
			
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgCap').click(function(){
			var datos=$('#formulario02').serialize();
            //alert(datos);  
           // return false;                   
			$.ajax({
				type:"POST",
				url:"../controladores/agregar_capitulo.php",
				data:datos,
				success:function(r){
                    //alert(r);
					if(r==1){
						alert("Capitulo Ingresado");

					}else{
						alert("No se inserto el Capitulo");
                       
					}
				}
			});
            return false;    
			
		});
	});
</script>
