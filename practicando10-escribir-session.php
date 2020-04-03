<?php
session_start();

$_SESSION['nombre'] = "Daniel";
$_SESSION['apellido'] = "Fuentes";

echo "He creado mis varibales de sessión";

