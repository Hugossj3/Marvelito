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
    public function buscador($nombre,$tipo/*,$isFav,$idUsuario*/){
        $x=$this->tabla;
        /*if($isFav){
            $x="(SELECT * FROM ".$this->tabla." WHERE id=(SELECT id_personaje FROM fav WHERE id_usuario=".$idUsuario."))";
        }*/
        if($tipo!="no"){
            $stmt = $this->conn->prepare("SELECT * FROM " .$x." WHERE tipoP=? && nombre LIKE '".$nombre."%'");
            $stmt->bind_param("s",$tipo);
        }else{
            $stmt = $this->conn->prepare("SELECT * FROM " .$x." WHERE nombre LIKE '".$nombre."%'");
        }
        
        

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
    public function leerFavoritos($idUsuario){
        $stmt = $this->conn->prepare(
            "SELECT * FROM ".$this->tabla." WHERE id=(SELECT id_personaje FROM fav WHERE id_usuario=".$idUsuario.")"
        );
        $stmt->bind_param("i",$idUsuario);
        $stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    public function quitarFavoritos($idPersonaje,$idUsuario){
        $stmt=$this->conn->prepare(
            "DELETE FROM fav WHERE id_personaje=? && id_usuario=?"
        );
        $stmt->bind_param("i",$idUsuario);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}