<?php

require_once 'bbdd.php';
session_start();
    
    $db = conectaBd();
     
    $consulta = "DELETE FROM producto WHERE IdProducto = :id ";
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":id" => $_SESSION['id']))) {
            $url = "listado.php";
            header('Location:'.$url);
    }
    $db = null;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>