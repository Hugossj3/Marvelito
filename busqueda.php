<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar en Marvel</title>
    <link rel="stylesheet" href="css/scpIndex.css">
</head>

<body>
    <header>
        <h1>Buscar en nuestra Enciclopedia</h1>
    </header>

    <nav>
        <div class="nav-item">
            <a href="index.php">Home</a>
        </div>
        <div class="nav-item">
            <a href="index.php">Catalogo</a>
        </div>
        <div class="nav-item">
            <a href="index.php">Registrate</a>
        </div>
        <div class="nav-item">
            <a href="index.php">Informacion</a>
        </div>
    </nav>


    <main>
        <div class="container">
            <form action="">
                <div class="busqueda">
                    <input type="text" id="search" placeholder="Busca un personaje...">
                    <select name="tematica" id="tematica">
                        <option value=""></option>
                        <?php
                        require "./conect/clases/Personaje.php";
                        $a = new Personaje();
                        $result = $a->leerTipos();
                        while ($person = $result->fetch_assoc()) {
                            // extract($person);
                            echo "<option value='".$person["tipoP"]."'>".$person["tipoP"]."</option> "; 
                        }
                        ?> 
                    </select>
                    <div class="fav">
                        <input type="checkbox" name="favoritos">
                        <h3>Mis Favoritos</h3>
                    </div>
                    <button type="submit">Buscar</button>
                </div>

            </form>
        </div>
        <div class="image-gallery" id="miGaleria">
            <!-- Aquí se insertarán las imágenes con descripciones -->
            <?php
            $result = $a->leer();
            while ($person = $result->fetch_assoc()) {
                extract($person);

                $datos = [
                    "id" => $id,
                    "nombre" => $nombre,
                    "img" => $img,
                    "descripcion" => $descripcion
                ];

                $lista = json_encode($datos);
                echo "<div class='image-item' onclick='mostrarDescripcion($id,$lista)'>";
                echo "<img src='$img' alt='Descripción imagen'>";
                echo "<h3 style='color:white'>" . $nombre . "</h3>";
                echo "<div class='description'>";
                echo "<p>Ver descripcion</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>


        </div>
        <div class="pagination">
            <button id="prevPage">⏪Anterior</button>
            <span id="currentPage">1</span>
            <button id="nextPage">Siguiente⏩</button>
        </div>
    </main>
    <div id="cart">
        <div id="cart-item"></div>
    </div>

    <script src="js/script.js"></script>

</body>

</html>