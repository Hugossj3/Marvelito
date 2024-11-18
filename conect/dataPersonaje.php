<?php
require_once __DIR__ . '/clases/Personaje.php';

// Configurar cabeceras para permitir CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$method = $_SERVER['REQUEST_METHOD'];
$path = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : [];
$personaje = new Personaje();

try {
    switch ($path[0]) {
        case 'personajes':
            if ($method === 'GET') {
                if (isset($_GET['nombre']) || isset($_GET['tipo']) || isset($_GET['isFav'])) {
                    $nombre = $_GET['nombre'] ?? null;
                    $tipo = $_GET['tipo'] ?? 'no';
                    $isFav = $_GET['isFav'] ?? null;
                    $idUsuario = $_GET['idUsuario'] ?? 0;
                    $result = $personaje->buscador($nombre, $tipo, $isFav, $idUsuario);
                } else {
                    $result = $personaje->leer();
                }
                echo json_encode($result->fetch_all(MYSQLI_ASSOC));
            }
            break;

        case 'tipos':
            if ($method === 'GET') {
                $result = $personaje->leerTipos();
                echo json_encode($result->fetch_all(MYSQLI_ASSOC));
            }
            break;

        case 'favoritos':
            if ($method === 'GET') {
                $idUsuario = $_GET['idUsuario'] ?? 0;
                $result = $personaje->leerFavoritos($idUsuario);
                echo json_encode($result->fetch_all(MYSQLI_ASSOC));
            } elseif ($method === 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);
                $idPersonaje = $data['idPersonaje'] ?? null;
                $idUsuario = $data['idUsuario'] ?? null;
                if ($personaje->addFavoritos($idPersonaje, $idUsuario)) {
                    http_response_code(201);
                    echo json_encode(['message' => 'Favorito añadido correctamente']);
                } else {
                    http_response_code(400);
                    echo json_encode(['message' => 'Error al añadir favorito']);
                }
            } elseif ($method === 'DELETE') {
                $data = json_decode(file_get_contents("php://input"), true);
                $idPersonaje = $data['idPersonaje'] ?? null;
                $idUsuario = $data['idUsuario'] ?? null;
                if ($personaje->quitarFavoritos($idPersonaje, $idUsuario)) {
                    http_response_code(200);
                    echo json_encode(['message' => 'Favorito eliminado correctamente']);
                } else {
                    http_response_code(400);
                    echo json_encode(['message' => 'Error al eliminar favorito']);
                }
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(['message' => 'Endpoint no encontrado']);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Error interno del servidor', 'error' => $e->getMessage()]);
}
