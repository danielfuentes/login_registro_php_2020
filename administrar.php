<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    $bd = conexion("localhost","ecommerce","3306","utf8","root","");
    $usuarios = listarUsuarios($bd,'usuarios');
    
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

    <title>Administrar</title>
  </head>
  <body>
    <div class="container-fluid">
        <?php require_once('partials/header.php');?>
        <section>
            <h1 class= "text-center text-info">Administrar Usuarios</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $indice => $usuario) :?>
                    <tr>                        
                        <td><?=$usuario['id'];?></td>
                        <td><?=$usuario['username'];?></td>
                        <td><a href="detalleUsuario.php?id=<?=$usuario['id'];?>"> <ion-icon name="eye-outline"></ion-icon></a></td>
                        <td><a href="#"> <ion-icon name="build-outline"></ion-icon></a></td>
                        <td><a href="#"> <ion-icon name="trash-outline"></ion-icon></a></td> 
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </section>
        <?php include('partials/footer.php');?>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
</html>