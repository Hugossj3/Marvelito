<?php
function dameConexion(){
    $conn =mysqli_connect("localhost", "root", "", "marvelito");
		
	$conn->set_charset("utf8");
		if ($conn->connect_errno) {
			$_SESSION["infMsg"]="Estamos teniendo problemas en el servidor, por favor intentelo mas tarde";
		} else {
			return $conn;
		}
}
