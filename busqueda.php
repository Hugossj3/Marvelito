<?php session_start(); ?>
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
        <input type="hidden" id="user" value="<?php echo isset($_SESSION["id_log"]) ? $_SESSION["id_log"] : ''; ?>">
        <div class="container">
            <form id="buscador" method="GET">
                <div class="busqueda">
                    <input type="text" name="nombre" id="search" placeholder="Busca un personaje...">
                    <select name="tematica" id="tematica">
                        <option value="no"></option>
                        <?php
                        require "./conect/clases/Personaje.php";
                        $a = new Personaje();
                        $result = $a->leerTipos();
                        while ($person = $result->fetch_assoc()) {
                            // extract($person);
                            echo "<option value='" . $person["tipoP"] . "'>" . $person["tipoP"] . "</option> ";
                        }
                        ?>
                    </select>
                    <div class="fav">
                        <input type="checkbox" name="favoritos" id="favoritos">
                        <h3>Mis Favoritos</h3>
                    </div>
                    <button type="submit">Buscar</button>
                </div>
            </form>

        </div>
        <div class="image-gallery" id="miGaleria">
            <!-- Aquí se insertarán las imágenes con descripciones -->
            

        </div>
        <div class="pagination">
            <button id="prevPage" class="pag-boton">⏪Anterior</button>
            <span id="currentPage">1</span>
            <button id="nextPage" class="pag-boton">Siguiente⏩</button>
        </div>
    </main>

    <?php
    if (isset($_SESSION["infMsg"])) {
        echo "<div class='inf' id='infor'>";
        echo "" . $_SESSION["infMsg"];
        echo "</div>";
        unset($_SESSION["infMsg"]);
    }
    ?>

    <div id="cart">
        <div id="cart-item"></div>
    </div>

    <script src="js/script.js"></script>

</body>

</html>