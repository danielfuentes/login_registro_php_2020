<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    $userName = "";
    $email = "";
    if($_POST){
        
        $userName = $_POST['userName'];
        $email = $_POST['email'];

        $errores = validarRegistro($_POST,$_FILES);
        if(count($errores)==0){
            //dd($_POST);
            //$usuario =  armarRegistro($_POST);
            //dd($usuario);
            //guardarRegistro($usuario);
            $bd = conexion("localhost","ecommerce","3306","utf8","root","");
            $avatar = armarAvatar($_FILES);
            guardarUsuario($bd,'usuarios',$_POST,$avatar);
            
            header('location: login.php');
        }
    }

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <title>Registro de usuarios</title>
  </head>
  <body>
    <div class="container-fluid">
        <?php require_once('partials/header.php');?>
        <section class="row fondo">
            <article class=" formulario  col-6 offset-3">
                <h1>Registro de usuarios</h1>
                <?php 
                if(isset($errores)):?>
                    <ul class="text-center alert alert-danger">
                        <?php foreach ($errores as $error) :?>
                            <li><?= $error;?></li>
                        <?php endforeach;?>                    
                    </ul>
                <?php endif;?>
                 
                <form id="formulario"  class="form" name="formRegistro"     novalidate action=""  method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="userName">Nombre de usuario</label>
                    
                    <input required name="userName" type="text"   value= "<?= $userName;?>" class="form-control" id="userName" placeholder="Nombre de usuario" >
                </div>
                
                        
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input required name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo" value= "<?=$email;?>">
                </div>
            
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input required name="password" type="password" value= "" class="form-control" id="password" placeholder="Contraseña">
                
                    <small class="form-text text-muted">Al menos 6 caracteres, debe contenter sólo números</small>
                </div>
                
                <div class="form-group">
                    <label for="password">Repetir contraseña</label>
                    <input required name="passwordRepeat" type="password" value= ""class="form-control" id="passwordRepeat" placeholder="Repetir contraseña">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input required name="avatar" type="file" value= "" class="form-control" id="avatar" >
                </div>           
            
                <button type="submit" class="btn btn-primary">Registrarme</button>
                <a href="login.php" class="btn btn-link">Ya poseo una cuenta</a>
            </form>
            </article>

        </section>    
        <?php include('partials/footer.php');?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>