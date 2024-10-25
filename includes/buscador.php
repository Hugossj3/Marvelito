<?php
session_start();
require_once __DIR__ . "/../conect/clases/Personaje.php";


if (isset($_GET["nombre"]) || isset($_GET["tematica"])) {
    $_SESSION["bnombre"] = $_GET["nombre"];
    $_SESSION["btematica"] = $_GET["tematica"];
    $_SESSION["bfav"]=$_GET["favoritos"];
    $_SESSION["consulta-buscador"]=true;
    header("location:../busqueda.php");
    exit;
}
function realizarBusquedad(Personaje $p) {
    return $p->buscador(
        $_SESSION["bnombre"],
         $_SESSION["btematica"],
            $_SESSION["bfav"],
            $_SESSION["id_log"]
        );
}













