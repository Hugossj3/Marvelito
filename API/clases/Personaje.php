<?php

require ("../conexion.php");
class Personaje{
    private string $tabla="personaje";
    private int $id;
    private string $nombre;
    private string $tipoP;
    private string $descripcion;
    private string $img;
    private $conn;

    public function __construct(){
        $this->conn =dameConexion();
    }
    public function leer(){

    }

}