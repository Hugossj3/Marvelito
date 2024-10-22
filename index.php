<?php
    require "includes/login.php";
    if(isset($_SESSION["id_log"]) && isset($_SESSION["nombre"])){
        $id=$_SESSION["id_log"];
        $nombre=$_SESSION["nombre"];
    }
    
    $log=login_hecho();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Friki</title>
    <link rel="stylesheet" href="css/scpIndex.css">
    <script src="https://kit.fontawesome.com/051b845acb.js" crossorigin="anonymous"></script>
</head>

<body>
    <input type="hidden" id="iniciado" value="<?php echo $log;?>">
    <input type="hidden" id="nUsu" value="<?php echo $nombre;?>">
    <header>
        <h1>Mundo Friki</h1>
        <span id="confi"></span>
    </header>

    <nav>
        <div class="nav-item">
            <a href="index.html">Home</a>
        </div>
        <div class="nav-item">
            <a href="#seccion-galeria">Catalogo</a>
        </div>
        <div class="nav-item">
            <a href="#seccion-registro">Registrate</a>
        </div>
        <div class="nav-item">
            <a href="#seccion-informacion">Informacion</a>
        </div>
    </nav>

    <section class="parallax" id="parallax1">
        <div class="content">
            <h2>Bienvenido a nuestra Web</h2>
            <p>
                Aqui podras encontrar la informacion que buscas de personajes del mundo de los superheroes de Marvel y
                de los fantasticos animes.<br /><br /><br />

                Registarte en la parte de abajo de nuestra pagina y conseguirás el acceso para revisar varios de
                nuestros articulos descriptivos referidos a esta cultura popular.<br /><br /><br />

                Una vez registrado puedes revisar el amplio Catalogo al cual nos referiamos en la misma página.
                <br /><br /><br />

                Si quieres saber más de nosotros revisa el apartado de Informacion y visita nuestras redes sociales
            </p>
        </div>
    </section>

    <section class="normal">
        <div class="container">
            <input type="hidden">
            <h3 id="seccion-galeria" id="seccion-galeria">¿Qué quieres saber?</h3>
            <p>Explora la vasta colección de personajes y eventos de Marvel y Anime.</p>
            <button onclick="abrirCatalogo()">Ir al Catalogo</button>
            <div class="error" id="sinRegistro"></div>
    </section>

    <section class="parallax" id="parallax2">
        <div class="content">
            <h2>Descubre este Universo</h2>
            <p>De hecho, está pagina es perfecta para aquellos que aun no han empezado con este mundillo de peliculas,
                comics, series, mangas, etc.<br /><br />
                Asi que te lo dejamos fácil, en nuestro Catalogo tendrás tarjetitas interactivas en las que podrás
                consultar la información que te proporcionamos nosotros.

            </p>
        </div>
    </section>

    <section class="normal" id="seccion-registro">
        <div class="container" id="registrado">
            <h2>Ya puedes acceder a nuestro catalogo Bienvenido</h2>
        </div>
        <div class="container" id="acceso">
            <form method="POST" action="includes/login.php">
                <div>
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="log-email" name="log-email">
                </div>
                <div>
                    <label for="personaje">Contraseña:</label>
                    <input type="password" id="log-contra" name="log-contra">
                </div>
                <div>
                    <button type="submit">Iniciar Sesion</button>
                    <?php
                    if(isset($_SESSION["msg-error"])){
                        echo "<div class='error'>".$_SESSION["msg-error"]."</div>";
                    }
                    ?>
                </div>
                <div>
                    <button onclick="abrirRegistro()">Registrarse</button>
                </div>
            </form>
        </div>
        <div class="container" id="formu-registro">
            <h3>Formulario de Datos Personales</h3>
            <form id="envioDatos">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                    <div class="error" id="nombreError"></div>
                </div>
                <div>
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad">
                    <div class="error" id="edadError"></div>
                </div>
                <div>
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email">
                    <div class="error" id="correoError"></div>
                </div>
                <div>
                    <label for="personaje">Contraseña:</label>
                    <input type="password" id="contra" name="contra">
                </div>
                <div>
                    <button type="submit">Enviar</button>
                    <button onclick="volver()">Volver</button>
                </div>
            </form>
        </div>
    </section>
    <hr>
    <footer>
        <h2>Necesitas Saber</h2>
        <div class="grid-foot">
            <div class="foot-item">
                <p id="seccion-informacion">© 2024 Enciclopedia Friki. Todos los derechos reservados para el creador.
                </p>
            </div>
            <div class="foot-item">
                <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                <i class="fa-brands fa-instagram" style="color: #ffffff;"></i>
                <i class="fa-brands fa-youtube" style="color: #ffffff;"></i><br />
            </div>
        </div>
    </footer>
    <script src="js/parallax.js"></script>
</body>

</html>