<?php
//Para iniciar sesión.
	session_start();
	if(!isset($_SESSION["id_usuario"]) || $_SESSION["id_usuario"]==null){
	  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registros encontrados</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
    scale=1, minimum-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href='../imagenes/favicon_univalle.ico' rel='shortcut icon' type='image/png'/>
</head>
<body>
	<section>
		<img src="../imagenes/logovallecartago.png" alt="Logo_Univalle">
		<h1 id="titulo_logo">Archivo central</h1>
		<nav>
			<ul>
				<li>
					<a href="../paginas/buscar.php">Regresar</a>
				</li>
				<li>
					<a href="../paginas/menu.php">Menú principal</a>
				</li>
		        <li>
		            <a href="logout.php">Cerrar Sesión</a>
		        </li>
	        </ul>
	    </nav>
	</section>
	<div class="registros">
		<?php 
			//Ocultamos los reportes de errores al usuario.
			error_reporting(E_ERROR);

			//Primero incluimos la conexión a la base de datos.
			include 'conexion.php';

			//Variable que contendrá el resultado de la búsqueda.
			$texto = '';
			//Variable que contendrá el número de registros encontrados.
			$registros = '';

			if($_POST){
				
			  	$busqueda = trim($_POST['buscar']);

			 	$entero = 0;
			  
			  	//Consulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar.

			  	//Generamos la consulta por documento de identidad o por nombre.
			  	$sql = "SELECT * FROM documentos WHERE doc_identidad like '$busqueda' or nombre like '%$busqueda%'";

			  	//Generamos la consulta de busqueda.
			  	// $sql = "SELECT * FROM documentos WHERE doc_identidad =" .$busqueda;
									  
				  $resultado = mysqli_query($conexion, $sql) 
				  or die("<h2>Error al consultar el registro.</h2>");
				  //Ejecutamos la consulta si hay resultados.
				  if (mysqli_num_rows($resultado) > 0){ 
				     //Se recoge el número de resultados.
				  	if(mysqli_num_rows($resultado) > 1){
					 $registros = '<center>' . mysqli_num_rows($resultado) . ' registros encontrados.' . '</center>';
				  	}else{
				  		$registros = '<center>' . mysqli_num_rows($resultado) . ' registro encontrado.' . '</center>';
				  	}
					echo "<h1><center>Tabla de archivos</center></h1>";
					echo "<center>";
					echo "<h2>".$registros."</h2>";
					echo "<table border='1' cellspacing='0px'>";
					echo "<tr>";
					echo "<th>Id</th>";
					echo "<th>Tipo de documento</th>";
					echo "<th>No. de documento</th>";
					echo "<th>Nombre</th>";
					echo "<th>Estante</th>";
					echo "<th>Bandeja</th>";
					echo "<th>Caja</th>";
					echo "<th>Carpeta</th>";
					echo "<th>Folio</th>";
					echo "</tr>";
				     //Se almacenan las cadenas de resultado.
					 while($fila = mysqli_fetch_array($resultado)){ 
				            echo "<tr>";
					        echo "<td>";
					        echo $fila["id_documento"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["tipo_documento"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["doc_identidad"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["nombre"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["estante"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["bandeja"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["caja"];
					        echo "</td>";
					        echo "<td>"; 
					        echo $fila["carpeta"];
					        echo "</td>";
					        echo "<td>"; 
				        	echo $fila["folio"];
					        echo "</td>";
					        echo "</tr>";
						 }
				  			echo "</table>";
				  			echo "</center>";
				  }else{
						   $texto = "<h2><center>El dato proporcionado no se encuentra en la base de datos.</center></h2>";
						   echo $texto;	
				  }
				  //Cerramos la conexión (por seguridad, no dejar conexiones abiertas).
				  mysqli_close($conexion);
			}
		?>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>
</body>
</html>
