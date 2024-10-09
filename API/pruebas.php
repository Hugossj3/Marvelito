<?php

require_once "conexion.php";


$a=dameConexion();
$query="SELECT img FROM personaje";
$stm=mysqli_query($a,$query);

if($stm->num_rows>0){
    while($personaje=mysqli_fetch_assoc($stm)){
        echo "<img src='".$personaje["img"]."'>";
    }
}