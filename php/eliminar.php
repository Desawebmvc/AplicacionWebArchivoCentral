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
	<title>Registro eliminado</title>
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
					<a href="../paginas/eliminar_registro.php">Regresar</a>
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

			//Variable que se utiliza para especificar el registro a eliminar. 
			$id_documento = $_POST['id_documento'];

			//Confirmamos que si exista el Id.
			if ($id_documento != "" and is_numeric($id_documento)) {
				$sql1 = "SELECT * FROM documentos WHERE id_documento='$id_documento'";
				$resultado = mysqli_query($conexion, $sql1) 
				or die("<h2>Error al consultar el registro.</h2>");

				if (mysqli_num_rows($resultado) > 0) {
					$sql = "DELETE FROM documentos WHERE id_documento='$id_documento'";
				//Si el campo no está vacío, procedemos a realizar la consulta.
				$consulta = mysqli_query($conexion, $sql)
				or die("<h2>Error al eliminar el registro.</h2>");

				echo "<h2><center>Registro eliminado correctamente.</center></h2>";
				}else{
					echo "<h2>El registro no existe.</h2>";
				}
			}
			
			//Cerramos la conexión (por seguridad, no dejar conexiones abiertas).
			mysqli_close($conexion);
		?>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>|
</body>
</html>
