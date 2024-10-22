<?php
session_start();
require_once __DIR__ . "/../conect/clases/Personaje.php";

if (isset($_GET["nombre"]) || isset($_GET["tematica"])) {
    $_SESSION["consulta-buscador"] = true;
    header("location:../busqueda.php");
    exit();  
}

function realizarBusquedad(Personaje $p) {
    return $p->buscador($_GET["nombre"], $_GET["tematica"]);
}












