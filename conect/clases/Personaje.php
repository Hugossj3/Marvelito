<?php

require_once __DIR__ . "/../conexion.php";
#clase de php para recopilar los datos de los personajes en la base de datos
class Personaje{
    private string $tabla="personaje";
    private $conn;

    #pide la conexion
    public function __construct(){
        $this->conn =dameConexion();
    }
    #hace una lectura general de los datos de los personajes
    public function leer(){
       $stmt = $this->conn->prepare("SELECT * FROM " . $this->tabla);
		
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    #lee los datos en funcion de los parametros que se le pasen
    
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
    #lee los distintos tipos de personaje
    public function leerTipos(){
        $stmt = $this->conn->prepare("SELECT DISTINCT tipoP FROM " . $this->tabla);
		
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    #lee los personajes favoritos del usuario que se le pase como parametro
    public function leerFavoritos($idUsuario){
        $stmt = $this->conn->prepare(
            "SELECT * FROM ".$this->tabla." WHERE id=(SELECT id_personaje FROM fav WHERE id_usuario=?)"
        );
        $stmt->bind_param("i",$idUsuario);
        $stmt->execute();
		$result = $stmt->get_result();
		return $result;
    }
    #devuelve true si el personaje que se pasa pertenece a los favoritos del usuario que se le pasa como parametro
    public function isFav($p,$user) {
        $query="SELECT * FROM favs WHERE id_personaje=? && id_usuario=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("ii",$p,$user);
        $stmt->execute();
        if($stmt->get_result()->num_rows==1){
            return true;
        }else{
            return false;
        } 
    }
    #añade el personaje que se pasa a la lista de favoritos del usuario pasado como parametro
    public function addFavoritos($p,$user){
        $stmt=$this->conn->prepare(
            "INSERT INTO favs(id_personaje, id_usuario) VALUES (?,?)"
        );
        $stmt->bind_param("ii",$p,$user);
        if($stmt->execute()){
            return true;
        }
        return false;

    }
    #quita el personaje que se pasa de la lista de favoritos del usuario pasado como parametro
    public function quitarFavoritos($idPersonaje,$idUsuario){
        $stmt=$this->conn->prepare(
            "DELETE FROM favs WHERE id_personaje=? && id_usuario=?"
        );
        $stmt->bind_param("ii",$idPersonaje,$idUsuario);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}