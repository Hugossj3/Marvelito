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
    public function buscador($nombre,$tipo,$isFav,$idUsuario){
        $query="SELECT * FROM " . $this->tabla." WHERE 1=1 ";
        if(isset($nombre)){
            $query.="&& nombre LIKE '".$nombre."%' ";
        }
        if($isFav=="on"){
            $query.="&& id IN(SELECT id_personaje FROM favs WHERE id_usuario=".$idUsuario.") ";
        }
        if($tipo!="no"){
            $query.="&& tipoP='".$tipo."' ";
        }
        $stmt=$this->conn->prepare($query);

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