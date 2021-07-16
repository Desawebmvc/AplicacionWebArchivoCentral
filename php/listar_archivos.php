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
	<title>Listado de documentos</title>
	<meta charset="UTF-8">
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
					<a href="../paginas/menu.php">Menú principal</a>
				</li>
		        <li>
		            <a href="logout.php">Cerrar Sesión</a>
		        </li>
	        </ul>
	    </nav>
	</section>
	<div id="listar">
	<h1><center>Documentos almacenados</center></h1>
	    <?php 
			function listar_archivos($carpeta){
			    if(is_dir($carpeta)){
			        if($dir = opendir($carpeta)){
			        	echo "<ol>";
			            while(($archivo = readdir($dir)) !== false){
			                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
			                	
			                    echo '<li><a id="listado" target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
			                }
			            }
			            echo "</ol>";
			            closedir($dir);
			        }
			    }
			}
		echo listar_archivos('C:\xampp\htdocs\archivo_univalle\documentos');
		?>
	</div>
	<!--Para confirmar sesión-->
	<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
	<!--Para finalizar sesión-->
	<?php endif;?>
</body>
</html>


