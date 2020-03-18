<?php
//Repaso de las funciones que ofrece PHP
$nombre = "           Daniel Fuentes               ";
$nombre = trim($nombre);
var_dump(strlen($nombre));
echo "<br>";
$password = "12345689";
//var_dump(is_numeric($password));
if(strlen($password)>6){
    echo "El password debe tener almenos 6 digitos...";
}else{
    echo "Perfecto";
}

echo "<br>";
$email = "cedavilu#gmail.com";
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Email invalido";
}

echo "<br>";
$apellido = "";
//if($apellido == ""){
//    echo "El campo apellido no lo puede dejar en blanco";
//}

//if(empty($apellido)){
//    echo "El campo apellido no lo puede dejar en blanco";
//}

if(strlen($apellido)==0){
    echo "El campo apellido no lo puede dejar en blanco";
}

echo "<br>";
$password = "A%*ma%123AA";
$rectificarPassword = "A%*ma%123AA";
if($password != $rectificarPassword){
  echo " Las contraseñas no son iguales.   Rectifique.";
}

echo "<br>";
echo $password;
$hasPassword = password_hash($password,PASSWORD_DEFAULT);
echo "<br>";
echo $hasPassword;

echo "<br>";
$password = "123456";
//$passwordVerificado =  password_verify($password,$hasPassword);
if(!password_verify($password,$hasPassword)){
    echo "Usuario y contraseña no coinciden";
}

//Cuando trabajamos con procedimientos, estos no retornan nada
//Cuando tenemos un código y este retorna algo, se llama función

$nombreUsuario = "Daniel Fuentes";

function saludar($nombreUsuario){
    return "Hola como vamos ".$nombreUsuario;
}

echo "<br>";
echo $nombreUsuario;
echo "<br>";
$resultado =  saludar("Alumnas y Alumnos");

echo "La función nos dice: ".$resultado;

























































