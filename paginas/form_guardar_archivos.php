<?php 
//Para iniciar sesión.
session_start(); 
if(!isset($_SESSION["id_usuario"]) || $_SESSION["id_usuario"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Guardar documento</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
	scale=1, minimum-scale=1">
	<link rel="stylesheet" href="../css/estilos.css">
	<link href='../imagenes/favicon_univalle.ico' rel='shortcut icon' type='image/png'/>
	<script src="../js/functions.js" type="text/javascript"></script>
</head>
<body>
	<section>
		<img src="../imagenes/logovallecartago.png" alt="Logo_Univalle">
		<h1 id="titulo_logo">Archivo central</h1>
		<nav>
			<ul>
				<li>
					<a href="menu.php">Menú principal</a>
				</li>
		        <li>
		            <a href="../php/logout.php">Cerrar Sesión</a>
		        </li>
	        </ul>
	    </nav>
	</section>
	<div id="div_uno">
		<center>
			<form name ="formularioContacto" id="buscador" enctype="multipart/form-data" action="../php/guardar_archivos.php" method="POST" onsubmit="return validar()">
				<h2><center>Oprima el botón seleccionar para subir un archivo</center></h2>
				<div class="custom-input-file">
						<input id="seleccionar" type="file" size="1" class="input-file" name="uploadedfile" required/>
						<label for="seleccionar">Seleccionar</label>	
				</div>
				<input id="file_submit" type="submit" value="Subir archivo" />
			</form>
		</center>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>	
</body>
</html>