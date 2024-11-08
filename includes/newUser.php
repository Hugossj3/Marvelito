<?php
ob_start(); // Limpia cualquier salida no intencionada

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json'); 

require_once __DIR__ . "/../conect/clases/Usuario.php";
require_once __DIR__ . "/login.php";

$usuario = new Usuario();


#recoje los datos de un formulario y crea un nuevo usuario

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["email"];
$contra = md5($_POST["contra"]);

$result = $usuario->insertar($nombre, $edad, $correo, $contra);

if ($result) {
    $_SESSION["infMsg"]="Usuario creado con éxito";
} else {
    $_SESSION["infMsg"]="El usuario no se pudo crear";
}



