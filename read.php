<?php
//Vista de los usuarios registrados en el sistema

require_once("Datos/Usuario.php");

$usuarios = Usuario::selectUsuarios();

echo json_encode($usuarios);