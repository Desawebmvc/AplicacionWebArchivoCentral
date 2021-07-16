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
	<title>Descarga</title>
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
					<a href="../paginas/form_descarga.php">Regresar</a>
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
			
		if (!isset($_GET['archivo']) || empty($_GET['archivo'])) {
		   exit();
		}

		//Utilizamos basename por seguridad, devuelve el 
		//nombre del archivo eliminando cualquier ruta. 
		$archivo = basename($_GET['archivo']);

		$ruta = '../documentos/'.$archivo;

		if (is_file($ruta))
		{
		   header('Content-Type: application/force-download');
		   header('Content-Disposition: attachment; filename='.$archivo);
		   header('Content-Transfer-Encoding: binary');
		   header('Content-Length: '.filesize($ruta));

		   readfile($ruta);
		}
		else
			echo "<h2>Error al descargar el archivo, verifique que el nombre del archivo no contenga tildes, eñes ni caracteres especiales.</h2>";
		   exit();
		?>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>
</body>
</html>