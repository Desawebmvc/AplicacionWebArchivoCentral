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
	<meta charset="UTF-8">
	<title>Agregar registro</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
	scale=1, minimum-scale=1">
	<link rel="stylesheet" href="../css/style.css">
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
	<div class="campostabla2">
		<form name ="formularioContacto" action="../php/ingresar.php" method="post" onsubmit="return validar()">
		<h2><center>Ingreso de registros</center></h2>
			<label for="doc">Tipo de documento:</label>
			<select id="doc" name="tipo_documento" required>
				<option value=""></option>
				<option value="cédula">Cédula</option>
				<option value="otros">Otros</option>
			</select><br><br>
			<label for="ident">Documento de identidad:</label>
			<input id="ident" class="enviar" type="number" name="doc_identidad" required>
			<label for="nombre">Nombre:</label>
			<input id="nombre" class="enviar" type="text" name="nombre" required>
			<label for="estante">Estante:</label>
			<input id="estante" class="enviar" type="text" name="estante" required>
			<label for="bandeja">Bandeja:</label>
			<input id="bandeja" class="enviar" type="text" name="bandeja" required>
			<label for="caja">Caja:</label>
			<input id="caja" class="enviar" type="text" name="caja" required>
			<label for="carpeta">Carpeta:</label>
			<input id="carpeta" class="enviar" type="text" name="carpeta" required>
			<label for="folio">Folio:</label>
			<input id="folio" class="enviar" type="text" name="folio" required>
			<input type="submit" value="Ingresar" name="ingresar">
		</form>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
	                     <?php else:?>
		
		<!--Para finalizar sesión-->
		<?php endif;?>
</body>
</html>