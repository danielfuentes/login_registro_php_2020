<?php
require_once('controladores/funciones.php');
require_once('helpers/dd.php');
$bd = conexion("localhost","ecommerce","3306","utf8","root","");
echo "Hola estas en usuario";
$id = $_GET['id'];


    $sql = "select * from usuarios where id=$id";
    $query = $bd->prepare($sql);
    $query->execute();
    $usuario=$query->fetch(PDO::FETCH_ASSOC);


    dd($usuario);
