<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validación</title>
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
					<a href="../index.php">Regresar</a>
				</li>
	        </ul>
	    </nav>
	</section>
	<div class="registros">
		<?php
			//Ocultamos los reportes de errores al usuario.
			error_reporting(E_ERROR);
			
			//Variables para el manejo del login
			$usuario = $_POST['usuario']; 
			$password = $_POST['password'];

			//Incluimos la conexión.
			include "conexion.php";
			
			$user_id=null;
			//Realizamos la consulta.
			$sql1= "SELECT * FROM usuario WHERE nombre_usuario='$usuario' and password='$password'";
			$query = mysqli_query($conexion, $sql1);
			while ($r=mysqli_fetch_array($query)) {
				$user_id=$r["id_usuario"];
				break;
			}
			//Condición para validar si el usuario coinside o no.
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../index.php';</script>";
			}else{
				session_start();
				$_SESSION["id_usuario"]=$user_id;
				print "<script>window.location='../paginas/menu.php';</script>";				
			}
		?>
	</div>
</body>
</html>
