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
    <title>Registros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-
    scale=1, minimum-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href='../imagenes/favicon_univalle.ico' rel='shortcut icon' type='image/png'/>
</head>
<body>
    <div class="registros">
<?php
    //Ocultamos los reportes de errores al usuario.
    error_reporting(E_ERROR);
     
    include 'conexion.php';
    //Limitamos la busqueda. 
    $tamano_pagina = 20; 

    //Examinamos la página a mostrar y el inicio del registro a mostrar. 
    $pagina = $_GET["pagina"]; 
    if (!$pagina) { 
        $inicio = 0; 
        $pagina=1; 
    } 
    else { 
        $inicio = ($pagina - 1) * $tamano_pagina; 
    }


    //Miramos a ver el número total de campos que hay en la tabla con esa búsqueda. 
    $sql = "select * from documentos " . $criterio; 
    $consulta = mysqli_query($conexion,$sql); 
    $num_total_registros = mysqli_num_rows($consulta); 
    //Calculamos el total de páginas. 
    $total_paginas = ceil($num_total_registros / $tamano_pagina); 

    //Ponemos el número de registros total, el tamaño de página y la página que se muestra. 
    echo "<h2><center>Existen: " . $num_total_registros . " registros en la base de datos<br></center></h2>"; 
    // echo "<h2>Se muestran páginas de " . $tamano_pagina . " registros cada una<br></h2>"; 
    // echo "<h2>Mostrando la página " . $pagina . " de " . $total_paginas . "<p></h2>";


    //Generamos la consulta para mostrar los registros en varias páginas. 
    $sql = "select * from documentos " . $criterio . " limit " . $inicio . "," . $tamano_pagina; 
    $consulta = mysqli_query($conexion,$sql);

    
    // echo "<h2 id='titulo_registro'>Tabla de registros</h2>";
    echo "<center><table border='1' cellspacing='0px'>";
    echo "<tr>";
    echo "<th>Id del documento</th>";
    echo "<th>Tipo de documento</th>";
    echo "<th>Número de documento</th>";
    echo "<th>Nombre</th>";
    echo "<th>Estante</th>";
    echo "<th>Bandeja</th>";
    echo "<th>Caja</th>";
    echo "<th>Carpeta</th>";
    echo "<th>Folio</th>";
    echo "</tr>"; 
    //Recorremos toda la tabla documentos.
    while ($row = mysqli_fetch_array($consulta)){ 
         echo "<tr>";
        echo "<td>";
        echo $row["id_documento"];
        echo "</td>";
        echo "<td>"; 
        echo $row["tipo_documento"];
        echo "</td>";
        echo "<td>"; 
        echo $row["doc_identidad"];
        echo "</td>";
        echo "<td>"; 
        echo $row["nombre"];
        echo "</td>";
        echo "<td>"; 
        echo $row["estante"];
        echo "</td>";
        echo "<td>"; 
        echo $row["bandeja"];
        echo "</td>";
        echo "<td>"; 
        echo $row["caja"];
        echo "</td>";
        echo "<td>"; 
        echo $row["carpeta"];
        echo "</td>";
        echo "<td>"; 
        echo $row["folio"];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table></center>";
    //Cerramos el conjunto de resultado y la conexión con la base de datos. 
    mysqli_free_result($consulta); 
    mysqli_close($conexion);


    //Mostramos los distintos índices de las páginas, si es que hay varias páginas. 
    if ($total_paginas > 1){ 
        for ($i=1;$i<=$total_paginas;$i++){ 
            if ($pagina == $i) 
                //Si mostramos el índice de la página actual, no coloco enlace.
                echo $pagina . " "; 
            else 
                //Si el índice no corresponde con la página mostrada actualmente, colocamos el enlace para ir a esa página. 
                echo "<a href='total_registros.php?pagina=" . $i . "&criterio=" . $txt_criterio . "'>" . $i . "</a> "; 
        } 
    }
?>
</div>
<!--Para confirmar sesión-->
<?php if(!isset($_SESSION["id_usuario"])):?>
                     <?php else:?>
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
    <!--Para finalizar sesión-->
    <?php endif;?>
</body>
</html>