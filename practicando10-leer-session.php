<?php
session_start();
require_once('helpers/dd.php');


//dd($_SESSION);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 10 - Sessiones</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <?php if(!isset($_SESSION['nombre'])== 'Daniel'){
        header('location: login.php');
    }else{?>
        <h2><?=$_SESSION['nombre']. " ".$_SESSION['apellido'];?>
    <?php };?>
   </h2>
   <!--Si desean ejecutar un cerrar session (logout.php o salir.php   Deben tener obligatoriamente session_start(); e inmediantamente ejecutan el session_destroy();--> 
</body>
</html>