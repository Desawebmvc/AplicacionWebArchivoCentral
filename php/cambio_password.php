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
	<title>Cambio de contraseña</title>
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
					<a href="../paginas/cambio_password.php">Regresar</a>
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

			$id_usuario = $_POST['id_usuario'];
			$nombre_usuario = $_POST['nombre_usuario'];
			// $nombre_usuario2 = $_POST['nombre_usuario2'];
			$password = $_POST['password'];
			$password_r = $_POST['password_r'];

			//Confirmamos que el usuario coinsida con el de la base de datos.
			if($nombre_usuario == "univalle"){
				if($password == $password_r){
				mysqli_query($conexion, "UPDATE usuario SET password='$password' WHERE nombre_usuario='$nombre_usuario'")
				or die("<h2><center>Error al cambiar la contraseña.</center></h2>");

				echo "<h2><center>Contraseña actualizada correctamente.</center></h2>";
				}else{
					echo "<h2><center>La contraseña no coincide.</center></h2>";
				}
			}else{
			echo "<h2><center>El nombre de usuario no coincide con el de la base de datos.</center></h2>";
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
