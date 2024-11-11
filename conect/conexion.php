<?php

#Esto es lo que da la conexion al resto del codigo con la base de datos
function dameConexion(){
    $conn =mysqli_connect("PMYSQL177.dns-servicio.com:3306",
	 "yooo", 
	 "c9Cjh70!4",
	  "10598388_marvelito");
		
	$conn->set_charset("utf8");
		if ($conn->connect_errno) {
			$_SESSION["infMsg"]="Estamos teniendo problemas en el servidor, por favor intentelo mas tarde";
		} else {
			return $conn;
		}
}
//filezilla: W2n@7s7g1