<?php

require_once __DIR__ . "/../conexion.php";
#clase de php para recopilar los datos de los usuarios en la base de datos
class Usuario{
    private string $tabla="usuario";
    private $conn;

    #pide la conexion
    public function __construct(){
        $this->conn =dameConexion();
    }
    #lee el usuario cuyo username y contraseña se pasa como parametro
    public function leer($usu,$pass){
        
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->tabla." WHERE correo=? && contra=?");
		

        $stmt->bind_param("ss",$usu,$pass);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    #ingresa un nuevo usuario con los datos pasados como parametros
    public function insertar($nombre,$edad,$correo,$contra){

        $stmt = $this->conn->prepare("INSERT INTO ".$this->tabla."(nombre, edad, correo, contra) VALUES (?,?,?,?)");

        $stmt->bind_param("siss",$nombre,$edad,$correo,$contra);
		if($stmt->execute()){
            return true;
        }

        return false;
    }

}