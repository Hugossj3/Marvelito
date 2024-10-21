<?php

function dameConexion(){
    $conn =mysqli_connect("localhost", "root", "", "marvelito");
		
	$conn->set_charset("utf8");
		if ($conn->connect_errno) {
			die("Error al conectar con MYSQL" . $conn->connect_error);
		} else {
			return $conn;
		}
}
