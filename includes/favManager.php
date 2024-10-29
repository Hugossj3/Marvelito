<?php
session_start();
require_once __DIR__ . "/../conect/clases/Personaje.php";

$p=new Personaje();
if(!$p->isFav($_GET["id"],$_GET["userId"])){
    $p->addFavoritos($_GET["id"],$_GET["userId"]);
    $_SESSION["infMsg"]="Se ha añadido el personaje a favoritos";
}else{
    $p->quitarFavoritos($_GET["id"],$_GET["userId"]);
    $_SESSION["infMsg"]="Se ha quitado el personaje de favoritos";
}
header("location:../busqueda.php");
exit;