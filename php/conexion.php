<?php 
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
//Conectar a la base de datos.
$conexion=mysqli_connect("localhost", "root", "", "archivo_univalle");

if (mysqli_connect_errno())
  {
  echo "Error al conectar a la base de datos." . mysqli_connect_error();
  }
 
?>