<?php

session_start();

require "../API/clases/Usuario.php";

$tryEmail=$_POST["log-email"];
$tryContra=md5($_POST["log-contra"]);

$usuario=new Usuario();

$result=$usuario->leer($tryEmail,$tryContra);

if($result->num_rows==1){

}else{
    $_SESSION["msg-error"]="No se ha podido iniciar sesion";
}
