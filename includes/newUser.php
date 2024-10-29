<?php
ob_start(); // Limpia cualquier salida no intencionada

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json'); 

require_once __DIR__ . "/../conect/clases/Usuario.php";
require_once __DIR__ . "/login.php";

$usuario = new Usuario();

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["email"];
$contra = md5($_POST["contra"]);

$result = $usuario->insertar($nombre, $edad, $correo, $contra);

if ($result) {
    $resultDB = $usuario->leerPorEmail($correo); // Asegúrate de tener un método "leerPorEmail" en la clase Usuario
    $_SESSION["infMsg"]="Usuario creado con éxito";
    if ($resultDB->num_rows == 1) {
        $bien = $resultDB->fetch_assoc();
        $_SESSION["id_log"] = $bien["id"];
        $_SESSION["nombre"] = $bien["nombre"];
        $_SESSION["edad"] = $bien["edad"];

        
        echo json_encode(['message' => 'Usuario creado con éxito. Sesión iniciada automáticamente.']);
    } else {
        echo json_encode(['message' => 'Usuario creado, pero no se pudo iniciar sesión automáticamente']);
    }
} else {
    echo json_encode(['message' => 'El usuario no se pudo crear']);
    $_SESSION["infMsg"]="El usuario no se pudo crear";
}

ob_end_flush();

