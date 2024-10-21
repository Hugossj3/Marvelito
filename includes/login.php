<?php

session_start();

require_once __DIR__ . "/../conect/clases/Usuario.php";


if (isset($_POST["log-email"]) && isset($_POST["log-contra"])) {
    $tryEmail = $_POST["log-email"];
    $tryContra = md5($_POST["log-contra"]);


    $usuario = new Usuario();

    $result = $usuario->leer($tryEmail, $tryContra);

    if ($result->num_rows == 1) {
        $bien = $result->fetch_assoc();
        $_SESSION["id_log"] = $bien["id"];
        $_SESSION["nombre"] = $bien["nombre"];
        $_SESSION["edad"] = $bien["edad"];
        echo $_SESSION["id_log"] . "<br/>";
        echo $_SESSION["nombre"] . "<br/>";
        echo $_SESSION["edad"] . "<br/>";

        header("location:../index.php");
    } else {
        $_SESSION["msg-error"] = "No se ha podido iniciar sesion";
    }

}


function login_hecho()
{
    return isset($_SESSION["id_log"]);
}