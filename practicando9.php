<?php
    require_once('helpers/dd.php');
    if($_FILES){
        echo "Estoy enviado los datos por el POST esta llegando nuestro FILE";
        //dd($_FILES);

        $nombre = ($_FILES['imagen']['name']);
        $archivoOrigen = $archivoOrigen = ($_FILES['imagen']['tmp_name']);
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        //dd($archivoOrigen); 
        //dd($_FILES);
        dd($archivoOrigen);
        if($_FILES['imagen']['error'] != 0){
            echo "Debe subir un archivo... <br>";
        }
        if($ext != "jpg" && $ext != "jpeg"  && $ext != "png"){
            echo "Debes subir archivos con extensión sólo JPG ó JPEG ó PNG<br>" ;
        }

        //Crear mi archivo destino (Ruta y nombre del archivo destino con su extensión)
        $archivoDestino = dirname(__FILE__);
        $archivoDestino = $archivoDestino."/imagenes";
        $imagen = uniqid();
        $archivoDestino = $archivoDestino."/".$imagen;
        $archivoDestino = $archivoDestino.".".$ext;
        move_uploaded_file($archivoOrigen,$archivoDestino);
        //dd($archivoDestino);
        echo "Archivo guardado satisfactoriamente en el servidor <br>";


    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practicando Clase 9</title>
</head>
<body>
    <h1>Formulario de envio de datos</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">
        <br>

        <input type="submit" value="Enviar Documento">
    </form>
</body>
</html>