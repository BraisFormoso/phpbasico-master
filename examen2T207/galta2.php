<?php
require_once 'bbdd.php';
require_once 'func.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
    $datos = Array();
    $datos[0] = (isset($_REQUEST['NombreProducto']))?
            $_REQUEST['NombreProducto']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['PrecioUnidad']))?
            $_REQUEST['PrecioUnidad']:"";
    $datos[2] = (isset($_REQUEST['UnidadesExistencia']))?
            $_REQUEST['UnidadesExistencia']:"";

    $errores = Array();
    $errores[0] = !validarNombreProducto($datos[0]);
    $errores[1] = !validarPrecio($datos[1]);
    $errores[2] = !validarExistencia($datos[2]);

    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1] || $errores[2]);

    
    if ($_SESSION['hayErrores']) {
    $url = "falta2.php";
    header('Location:'.$url);
} else {
    $db = conectaBd();
    $nombre_producto = $_REQUEST['NombreProducto'];
    $precio_unidad = $_REQUEST['PrecioUnidad'];
    $unidades_existencia =  $_REQUEST['UnidadesExistencia'];
    
    $consulta = "INSERT INTO producto 
    (NombreProducto, PrecioUnidad, UnidadesExistencia)
    VALUES (:nombre_producto, :precio_unidad, :unidades_existencia)";
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":nombre_producto" => $nombre_producto, ":precio_unidad" => $precio_unidad,
        ":unidades_existencia" => $unidades_existencia))) {
        unset($_SESSION['datos']);
        unset($_SESSION['errores']);
        unset($_SESSION['hayErrores']);
        $url = "listado.php";
        header('Location:'.$url);
    } else {
        $url = "error.php?msg_error=Error_Grabar_Nuevo_Producto";
        header('Location:'.$url);
    }
}
    $db = null;


?>