<?php

require_once __DIR__ . "/../conexion.php";
class Personaje{
    private string $tabla="personaje";
    private $conn;

    public function __construct(){
        $this->conn =dameConexion();
    }
    public function leer(){
       $stmt = $this->conn->prepare("SELECT * FROM " . $this->tabla);
		
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    public function leerTipos(){
        $stmt = $this->conn->prepare("SELECT DISTINCT tipoP FROM " . $this->tabla);
		
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
}