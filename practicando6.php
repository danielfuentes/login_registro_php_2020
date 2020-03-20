<?php
require_once('helpers/dd.php');
//PHP nos ofrece la posibilidad de trabajar con archivos txt.
// nombre1;apellido1;email
// nombre2,apellido2;email2
//Archivos formato JSON  - API
//Tener una base de datos  (ARRAY ASOCIATIVO) y la misma la puedo pasar a un archivo JSON

$personas = [
    0 => [
        "nombre" => "Pedro",
        "apellido" => "Perez",
        "email" => "pedro@gmail.com"
    ],
    1 =>[
        "nombre" => "José",
        "apellido" => "Medina",
        "email" => "jose@gmail.com"

    ]

];

//dd($personas);
var_dump($personas);
echo "<hr>";
$archivoJson = json_encode($personas);
var_dump($archivoJson);
//dd($archivoJson);
echo "<hr>";
$arrayOriginal = json_decode($archivoJson,true);

//dd($arrayOriginal);
var_dump($arrayOriginal);

//estoy simulando un registro de usuarios
$usuario = [
    [
        "nombre" => "Gloria",
        "apellido" => "Medina",
        "email" => "gloria@gmail.com"
    ]
];

echo "<hr>";
var_dump($usuario);

$usuariosJson = json_encode($usuario);
//Ahora debo guardar esos datos del usuario en un archivo en mi servidor

file_put_contents("practica6.json",$usuariosJson,FILE_APPEND);

$archivoPractica6 = file_get_contents('practica6.json');

echo "<br>";
var_dump($archivoPractica6);

//Base de Datos (Investigar PHP - PDO)
//Tratar de crear un CRUD  (Create - Read - Update - Delete)
// insert into - select - update - delete

//$_SESSION  $_COOKIE




























