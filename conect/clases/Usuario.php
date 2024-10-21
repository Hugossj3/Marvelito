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

    public function insertar($nombre,$edad,$correo,$contra){
        $clave=md5($contra);

        $stmt = $this->conn->prepare("INSERT INTO ".$this->tabla."(nombre, edad, correo, contra) VALUES (?,?,?,?)");

        $stmt->bind_param("siss",$nombre,$edad,$correo,$clave);
		if($stmt->execute()){
            return true;
        }

        return false;
    }

}