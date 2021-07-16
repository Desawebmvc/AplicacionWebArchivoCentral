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
	<title>Eliminar registro</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
	scale=1, minimum-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link href='../imagenes/favicon_univalle.ico' rel='shortcut icon' type='image/png'/>
	<script src="../js/functions.js" type="text/javascript"></script>
	<script type="text/javascript">
		if(!("autofocus" in document.createElement("input")))
  			document.getElementById("id").focus();
	</script>
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
	<div>
		<center>
			<form name ="formularioContacto" action="../php/eliminar.php" method="post" onsubmit="return validar()">
			<h2><center>Eliminar registro</center></h2>
				<label for="id">Id del documento:</label>
				<input id="id" autofocus type="number" name="id_documento" required>
				<input type="submit" value="Eliminar" name="eliminar">	
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