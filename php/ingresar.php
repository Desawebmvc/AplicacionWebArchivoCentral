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
	<title>Registro ingresado</title>
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
					<a href="../paginas/agregar_registro.php">Regresar</a>
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
			header('Content-Type: text/html; charset=UTF-8');
			//Ocultamos los reportes de errores al usuario.
			error_reporting(E_ERROR);
			
			//Primero incluimos la conexión a la base de datos.
			include 'conexion.php';

			//Creamos las variables que vamos a utilizar.
			$tipo_documento = $_POST['tipo_documento'];
			$doc_identidad = $_POST['doc_identidad'];
			$nombre = $_POST['nombre'];
			$estante = $_POST['estante'];
			$bandeja = $_POST['bandeja'];
			$caja = $_POST['caja'];
			$carpeta = $_POST['carpeta'];
			$folio = $_POST['folio'];

			//Si todos los campos están completos procedemos a realizar la consulta.
			$sql = "INSERT INTO documentos (tipo_documento, doc_identidad, nombre, estante, bandeja, caja, carpeta, folio) VALUES ('$tipo_documento', '$doc_identidad', '$nombre', '$estante', '$bandeja', '$caja', '$carpeta', '$folio')";

			//Ejecuto la consulta
			$resultado = mysqli_query($conexion, $sql)
			or die ("<h2>Error al insertar datos.</h2>");

			//Cerramos la conexión (por seguridad, no dejar conexiones abiertas).
			mysqli_close($conexion);
			echo "<h2><center>Datos insertados correctamente.</center></h2>"."<br>";
		?>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>
</body>
</html>

