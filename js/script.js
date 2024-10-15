
const tarjetita=document.getElementById("cart");
const contentDesc=document.getElementById("cart-item");

const itemsPerPage = 12;
let currentPage = 1;

const imageItems = document.querySelectorAll('.image-item');
const totalPages = Math.ceil(imageItems.length / itemsPerPage);

// Mostrar los elementos de la página actual
function showPage(page) {
  // Ocultamos todos los elementos
  imageItems.forEach((item, index) => {
    item.style.display = 'none';
  });

  // Mostramos solo los elementos que están en la página actual
  const start = (page - 1) * itemsPerPage;
  const end = page * itemsPerPage;
  for (let i = start; i < end && i < imageItems.length; i++) {
    imageItems[i].style.display = 'block';
  }

  // Actualizamos el número de página actual en el DOM
  document.getElementById('currentPage').textContent = page;
}

// Evento para ir a la página anterior
document.getElementById('prevPage').addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    showPage(currentPage);
  }
});

// Evento para ir a la siguiente página
document.getElementById('nextPage').addEventListener('click', () => {
  if (currentPage < totalPages) {
    currentPage++;
    showPage(currentPage);
  }
});

// Mostrar la primera página al cargar
showPage(currentPage);


function mostrarDescripcion(id,datos){
    tarjetita.classList.toggle("open");
    contentDesc.innerHTML=`
        <h2>${datos.nombre}</h2>
        
        <img src="${datos.img}" alt="Descripción imagen seleccionada">
        <div class="info">${datos.descripcion}</div>
    `;
}



