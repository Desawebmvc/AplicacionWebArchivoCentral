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
	<title>Menú principal</title>
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
	</section>
	<div>
	    <h1><center>PROGRAMA DE ARCHIVO</center></h1>
	    <a href="../php/total_registros.php">Listado de registros</a><br>
	    <a href="buscar.php">Buscar registro</a><br>
	    <a href="agregar_registro.php">Agregar registro</a><br>
		<a href="eliminar_registro.php">Eliminar registro</a><br>
		<a href="actualizar_registro.php">Actualizar registro</a><br>
		<a href="../php/listar_archivos.php">Listado de documentos</a><br>
		<a href="form_guardar_archivos.php">Guardar documento</a><br>
		<a href="form_borrar_archivos.php">Eliminar documento</a><br>
		<a href="form_descarga.php">Descargar documento</a><br>
		<a href="cambio_password.php">Cambiar contraseña</a><br>
		<!--Para confirmar sesión-->
	    <?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
                      <a href="../php/logout.php">Cerrar Sesión</a>
                      <!--Para finalizar sesión-->
                       <?php endif;?>
	</div>
</body>
</html>