<?php
//Crear una función que se encargue de sumar
function sumar($valor1,$valor2){
    return $valor1 + $valor2;
}

function datos($dato1,$dato2,$dato3,$dato4){
    return [$dato1,$dato2,$dato3,$dato4];
}

//Funciones de validación de nuestro Registro de Usuarios
function validarRegistro($datos){
    $errores = [];
   
    $userName = trim($datos['userName']);
    
    if(empty($userName)){
        $errores['userName'] = "El campo no puede estar en blanco";
    }

    $email = trim($datos['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "Email  inválido...";
    }
    $password = trim($datos['password']);
    if(empty($password)){
        $errores['password'] = "Password  no lo puede dejar en blanco...";
    }elseif (strlen($password)>6) {
        $errores['password'] = "Password  sólo debe poseer hasta 6 digitos";
    }elseif (is_numeric($password)==false) {
        $errores['password'] = "Password  sólo debe poseer digitos numericos";
    }
    $passwordRepeat = trim($datos['passwordRepeat']);
    if($password != $passwordRepeat){
        $errores['passwordRepeat'] = "Las contraseñas no coinciden. Verifique ....";
    }

    return $errores;
}

function armarRegistro($datos){
    $usuario = [
        "userName" => $datos['userName'],
        "email" => $datos['email'],
        "password" => password_hash($datos['password'],PASSWORD_DEFAULT),
        "role" => 1
    ];
    
    return $usuario;
}

function guardarRegistro($registro){
    $archivoJson = json_encode($registro);
    file_put_contents('usuarios.json',$archivoJson.PHP_EOL,FILE_APPEND);
}







