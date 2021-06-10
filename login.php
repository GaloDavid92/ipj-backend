<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once("Datos/Usuario.php");


$usuarios = Usuario::login($_GET["name"], $_GET["pass"]);

echo json_encode($usuarios);