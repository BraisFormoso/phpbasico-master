<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Examen 2T</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <div class="formulario">&nbsp;</div>
        <h1>Confirmar Borrado</h1>

        <li><a href="index.php">Inicio</a></li>            
        <li><a href="listado.php">Listado</a></li>
        </ul>
                <?php
        session_start();
        $_SESSION['id']=$_REQUEST['id'];
        require_once 'bbdd.php';
            $db = conectaBd();
            $consulta = "SELECT * FROM producto WHERE IdProducto=".$_SESSION['id'];
            $resultado = $db->query($consulta);
            foreach ($resultado as $registro){
            echo '</br>';
            echo 'Producto a eliminar: ';
            echo $registro['NombreProducto'];
            echo '</br>';
            }
        ?>
        <li><a href="borrar.php"> Confirmar Borrado</a></li>
        <ul>
    </body>
</html>
