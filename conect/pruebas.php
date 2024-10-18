<?php

require "conexion.php";
require "./clases/Personaje.php";

$a=new Personaje();

$person=$a->leer()->fetch_assoc();
extract($person);

echo $id."manolo<br/>";

$boleano=true;
echo $boleano;