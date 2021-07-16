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
	<title>Actualización de registro</title>
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
					<a href="../paginas/actualizar_registro.php">Regresar</a>
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
	<div>
		<?php
			//Ocultamos los reportes de errores al usuario.
			error_reporting(E_ERROR);

			//Primero incluimos la conexión a la base de datos.
			include 'conexion.php';

			//Creamos las variables que vamos a utilizar.
			$id_documento = $_POST['id_documento'];
			$tipo_documento = $_POST['tipo_documento'];
			$doc_identidad = $_POST['doc_identidad'];
			$nombre = $_POST['nombre'];
			$estante = $_POST['estante'];
			$bandeja = $_POST['bandeja'];
			$caja = $_POST['caja'];
			$carpeta = $_POST['carpeta'];
			$folio = $_POST['folio'];

			$id_documento = $_POST['id_documento'];

			//Confirmamos que si exista el Id.
			if ($id_documento != "" and is_numeric($id_documento)) {
				$sql1 = "SELECT * FROM documentos WHERE id_documento='$id_documento'";
				$resultado = mysqli_query($conexion, $sql1) 
				or die("<h2>Error al consultar el registro.</h2>");

				if (mysqli_num_rows($resultado) > 0) {

					mysqli_query($conexion, "UPDATE documentos SET tipo_documento='$tipo_documento', doc_identidad='$doc_identidad', nombre='$nombre',estante='$estante', bandeja='$bandeja', caja='$caja', carpeta='$carpeta', folio='$folio' WHERE id_documento='$id_documento'")
					or die("<h2><center>Error al actualizar el registro.</center></h2>");

					echo "<h2><center>Registro actualizado correctamente.</center></h2>";
				}else{
					echo "<h2>El Id del documento no existe, confirme que lo haya escrito bien.</h2>";
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
	<?php endif;?>
</body>
</html>
