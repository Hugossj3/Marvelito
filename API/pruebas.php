<?

require_once("conexion.php");


$a=dameConexion();

$query="SELECT img FROM personaje";
$stm=$a->prepare($query);
$result=$stm->get_result();

if($result->num_rows>0){
    while($personaje=$result->fetch_assoc()){
        extract($personaje);
    }
}