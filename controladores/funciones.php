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
        $errores['userName'] = "Este campo no puede estar en blanco";
    }
    
    return $errores;
}