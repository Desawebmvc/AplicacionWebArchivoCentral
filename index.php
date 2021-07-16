<?php
//Para iniciar sesión. 
	session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
	scale=1, minimum-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link href='imagenes/favicon_univalle.ico' rel='shortcut icon' type='image/png'/>
	<script type="text/javascript">
		if(!("autofocus" in document.createElement("input")))
  			document.getElementById("usuario").focus();
	</script>
</head>
<body>
	<section>
		<img src="imagenes/logovallecartago.png" alt="Logo_Univalle">
		<h1 id="titulo_logo">Archivo central</h1>
	</section>
	<div>
		<center>
			<form action="php/login.php" method="post">
				<h2><center>Iniciar sesión</center></h2>
				<label>Usuario:</label>
				<input id="usuario" autofocus type="text" placeholder="Usuario" name="usuario" required>
				<label>Contraseña:</label>
				<input type="password" placeholder="Contraseña" name="password" required>
				<input type="submit" value="Ingresar">
			</form>
		</center>
	</div>
</body>
</html>
