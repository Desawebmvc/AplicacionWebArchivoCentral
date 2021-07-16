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
	<title>Documento borrado</title>
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
					<a href="../paginas/form_borrar_archivos.php">Regresar</a>
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

		//Recogemos la información del input.
		$filename = "../documentos/" . $_POST['archivo'];

		//Para borrar el documento.
		// unlink($filename);
		if (!unlink($filename)) {
			echo "<h2>Error al borrar el archivo, verifique que el nombre del archivo no contenga tildes, eñes ni caracteres especiales.</h2>";
		}else{
			echo "<h2><center>El archivo -<font>".$_POST['archivo']."</font>- ha sido borrado correctamente.</center></h2>";
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