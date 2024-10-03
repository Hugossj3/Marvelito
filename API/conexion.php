<?

function dameConexion(){
    $conn = new mysqli("localhost", "root", "", "marvelito");
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die("Error al conectar con MYSQL" . $conn->connect_error);
		} else {
			return $conn;
		}
}