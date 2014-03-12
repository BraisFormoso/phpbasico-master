<?php
require_once 'bbdd.php';
require_once 'func.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $db = conectaBd();
    $login = $_REQUEST['Login'];
    $password = $_REQUEST['Password'];
    $nombre =  $_REQUEST['Nombre'];
    
    $consulta = "INSERT INTO usuario 
    (Login, Password, Nombre)
    VALUES (:login, :password, :nombre)";
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":login" => $login, ":password" => $password,
        ":nombre" => $nombre))) {
        $url = "acceso.php";
        header('Location:'.$url);
    } else {
        $url = "error.php?msg_error=Error_Grabar_Nuevo_Software";
        header('Location:'.$url);
    }

    $db = null;


?>