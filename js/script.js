const tarjetita = document.getElementById("cart");
const contentDesc = document.getElementById("cart-item");

const itemsPerPage = 12;  // Número de personajes por página
let currentPage = 1;      // Página actual
let personajes = [];      // Almacenaremos todos los personajes aquí
const userId = document.getElementById("user").value;  // ID del usuario

const galeria = document.getElementById("miGaleria");  // Contenedor de la galería de imágenes
const prevButton = document.getElementById('prevPage');
const nextButton = document.getElementById('nextPage');
const currentPageElement = document.getElementById('currentPage');


function noPersonajes() {
  galeria.innerHTML = "<h2 style='color:black'>No se han encontrado Personajes</h2>"
}
// Función para cargar todos los personajes
function cargarPersonajes() {
  fetch('conect/dataPersonaje.php/personajes', {
    method: 'GET',
    headers: { 'Content-Type': 'application/json' }
  })
    .then(response => response.json())  // Leer como JSON
    .then(data => {
        personajes = data;  // Guardamos los personajes en la variable global
        mostrarPagina(currentPage);  // Mostrar la página inicial
    }) 
    .catch(error => console.error('Error de red:', error));
}

// Función para mostrar la página actual de personajes
function mostrarPagina(page) {
  // Calcular el índice de inicio y fin de la página actual
  const start = (page - 1) * itemsPerPage;
  const end = page * itemsPerPage;

  // Filtrar los personajes que deben mostrarse en la página actual
  const personajesPagina = personajes.slice(start, end);

  galeria.innerHTML = "";

  // Verificar si hay personajes que mostrar
  if (personajesPagina.length > 0) {
    // Si hay personajes, mostrar los personajes de la página actual
    personajesPagina.forEach(person => {
      galeria.innerHTML += `
        <div class='image-item' onclick='mostrarDescripcion(${person.id}, ${JSON.stringify(person)}, ${userId})'>
          <img src='${person.img}' alt='Descripción imagen'>
          <h3 style='color:white'>${person.nombre}</h3>
          <div class='description'>
            <p>Ver descripcion</p>
          </div>
        </div>
      `;
    });
  } else {
    // Si no hay personajes, mostrar un mensaje
    galeria.innerHTML = "<h2>No se encontraron resultados</h2>";
  }

  // Actualizar la página actual en el display
  currentPageElement.innerText = page;

  // Habilitar o deshabilitar los botones de paginación
  prevButton.disabled = page === 1;
  nextButton.disabled = page === Math.ceil(personajes.length / itemsPerPage);
}

// Función para manejar la acción de ir a la página anterior
prevButton.addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    mostrarPagina(currentPage);  // Recargar personajes para la página anterior
  }
});

// Función para manejar la acción de ir a la página siguiente
nextButton.addEventListener('click', () => {
  if (currentPage < Math.ceil(personajes.length / itemsPerPage)) {
    currentPage++;
    mostrarPagina(currentPage);  // Recargar personajes para la página siguiente
  }
});

// Función para buscar personajes según el formulario de búsqueda
document.getElementById("buscador").addEventListener("submit", function (event) {
  event.preventDefault();

  const params = {};
  let bNombre = document.getElementById("search").value;
  let bTipo = document.getElementById("tematica").value;
  let bFav = document.getElementById("favoritos").checked ? "on" : "";

  // Solo agregar parámetros si tienen un valor
  if (bNombre) params.nombre = bNombre;
  if (bTipo) params.tipo = bTipo;
  if (bFav) params.isFav = bFav;
  params.idUsuario = userId;

  // Convertir los parámetros en una cadena de consulta
  const query = new URLSearchParams(params).toString();

  // Cargar los personajes con los parámetros de búsqueda
  fetch(`conect/dataPersonaje.php/personajes?${query}`, {
    method: 'GET',
    headers: { 'Content-Type': 'application/json' }
  })
    .then(response => response.json())
    .then(data => {
        personajes = data;  // Actualizar los personajes con los resultados de la búsqueda
        currentPage = 1;  // Reiniciar a la página 1 después de una nueva búsqueda
        if (personajes.length > 0) {
          mostrarPagina(currentPage);
      } else {
          noPersonajes()
      } // Mostrar los personajes filtrados en la primera página
      
    })
    .catch(error => console.error('Error:', error));
});

// Inicializar la carga de personajes al cargar la página
cargarPersonajes();

// Muestra un mensaje de información al usuario
let info = document.getElementById("infor");
if (info) {
  info.style.display = "block";
  setTimeout(() => {
    info.style.display = "none";
  }, 3000);
}

// Función para mostrar la tarjeta de información de un personaje
function mostrarDescripcion(id, datos, userId) {
  tarjetita.classList.toggle("open");
  contentDesc.innerHTML = `
    <h2>${datos.nombre}</h2>
    <img src="${datos.img}" alt="Descripción imagen seleccionada">
    <div class="info">${datos.descripcion}</div>
    <form method="GET" action="includes/favManager.php">
        <input type="hidden" name="id" value="${id}">
        <input type="hidden" name="userId" value="${userId}">
        <button class="star-button" type="submit" title="Añadir o quitar de favoritos">★</button>
    </form>
  `;
}
