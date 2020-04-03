<?php
session_start();
//Crear una función que se encargue de sumar
function sumar($valor1,$valor2){
    return $valor1 + $valor2;
}

function datos($dato1,$dato2,$dato3,$dato4){
    return [$dato1,$dato2,$dato3,$dato4];
}

//Funciones de validación de nuestro Registro de Usuarios
function validarRegistro($datos,$imagen){
    
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
    $imagen =trim($_FILES['avatar']['name']);
    
     
    $archivoOrigen = $archivoOrigen = ($_FILES['avatar']['tmp_name']);
    $ext = pathinfo($imagen,PATHINFO_EXTENSION);
    if($_FILES['avatar']['error'] != 0){
        $errores['avatar'] = "Debe subir un archivo...";
    }elseif($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        $errores['avatar'] = "Debes subir archivos con extensión sólo JPG ó JPEG ó PNG";
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
//Para conectar a la base de datos requerimos el $dsn,$usuario (root),password ("") utf-8
//dsn = Nombre de Origien Datos
function conexion($host,$dbName, $puerto,$charset,$usuario,$password){
    try {
        $dsn = "mysql:host=$host;dbname=$dbName;port=$puerto;charset=$charset";
        $bd = new PDO($dsn,$usuario,$password);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bd;        
    } catch (PDOException $error) {
        echo "No me logre conectar con la base de datos ".$error->getMessage();
        exit;
    }
}


function guardarUsuario($bd,$tabla,$datos,$imagen){
    $userName = $datos['userName'];
    $email = $datos['email'];
    $password = password_hash($datos['password'],PASSWORD_DEFAULT);
    $role = 1;
    $avatar = $imagen;
    
    $sql = "insert into $tabla (username,email,password,role,avatar) values (:username,:email,:password,:role,:avatar)";
    $query = $bd->prepare($sql);
    $query->bindValue(':username',$userName);
    $query->bindValue(':email',$email);
    $query->bindValue(':password',$password);
    $query->bindValue(':role',$role);
    $query->bindValue(':avatar',$avatar);

    $query->execute();
}


function listarUsuarios($bd,$tabla){
    $sql = "select * from $tabla";
    $query = $bd->prepare($sql);
    $query->execute();
    $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
}

//Función para guardar la imagen
function armarAvatar($imagen){
    $nombre = $imagen['avatar']['name'];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenes/";
    $avatar = uniqid().".".$ext;
    $archivoDestino = $archivoDestino.$avatar;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    return $avatar;
}


// ------- Funciones usadas por el Login -----------
//Función paa validar el acceso al usuario
function validarLogin($datos){
    
    $errores = [];
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
    return $errores;
}


//Función control acceso al usuario - Buscando por el email del mismo
function buscarPorEmail($bd,$tabla,$email){
    $sql="select * from $tabla where email='$email'";
    $query=$bd->prepare($sql);
    $query->execute();
    $usuario=$query->fetch(PDO::FETCH_ASSOC);
   
    if($usuario !=null){
        if($email === $usuario['email']){
            return $usuario;
      }  
    }
    return null;
}    

//Función seteo del usuario
function seteoUsuario($usuario,$datos){
    $_SESSION["username"] = "$usuario[username]"; 
    $_SESSION["email"] = "$usuario[email]"; 
    $_SESSION["role"] = "$usuario[role]"; 
    $_SESSION["avatar"] = "$usuario[avatar]"; 
    if($datos['recordarme'] === 'recordarme' ) {
        setcookie('email', $datos['email'] , time()+3600);
        setcookie('password' ,$datos['password'],time()+3600);
    }
}

//Funcion que valida el acceso
function validarUsuario(){
    if(isset($_SESSION['email'])){
        return true;
    }elseif (isset($_COOKIE['email'])) {
        $_SESSION['email'] = $_COOKIE['email'];
        return true;
    }else{
        return false;
    }
}






