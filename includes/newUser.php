<?php
session_start();
require_once __DIR__ . "/../conect/clases/Usuario.php";
require_once __DIR__ . "/login.php";
$usuario=new Usuario();

$nombre=$_POST["nombre"];
$edad=$_POST["edad"];
$correo=$_POST["email"];
$contra=md5($_POST["contra"]);

$result=$usuario->insertar($nombre,$edad,$correo,$contra);

if($result){
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['success' => false, 'message' => 'El usuario no se pudo crear']);

}

header("location:../index.php");