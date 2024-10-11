<?php

require "conexion.php";
require "./clases/Personaje.php";

$a=new Personaje();

while($person=$a->leer()->fetch_assoc()){
    extract($person);

    echo "".$id;
}

