<?php

require_once __DIR__ . "/../conexion.php";
class Usuario{
    private string $tabla="usuario";
    private $conn;

    public function __construct(){
        $this->conn =dameConexion();
    }
    public function leer($usu,$pass){
        
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->tabla." WHERE correo=? && contra=?");
		

        $stmt->bind_param("ss",$usu,$pass);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    public function leerPorEmail($email) {
        $query = "SELECT * FROM ".$this->tabla." WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    public function insertar($nombre,$edad,$correo,$contra){

        $stmt = $this->conn->prepare("INSERT INTO ".$this->tabla."(nombre, edad, correo, contra) VALUES (?,?,?,?)");

        $stmt->bind_param("siss",$nombre,$edad,$correo,$contra);
		if($stmt->execute()){
            return true;
        }

        return false;
    }

}