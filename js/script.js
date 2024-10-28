


const tarjetita=document.getElementById("cart");
const contentDesc=document.getElementById("cart-item");

const itemsPerPage = 12;
let currentPage = 1;

const galeria=document.getElementById("miGaleria");
const imageItems = document.querySelectorAll('.image-item');
const totalPages = Math.ceil(imageItems.length / itemsPerPage);

// Paginacion
function showPage(page) {
  
  imageItems.forEach((item, index) => {
    item.style.display = 'none';
  });

  
  const start = (page - 1) * itemsPerPage;
  const end = page * itemsPerPage;
  for (let i = start; i < end && i < imageItems.length; i++) {
    imageItems[i].style.display = 'block';
  }

  
  document.getElementById('currentPage').textContent = page;
}


document.getElementById('prevPage').addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    showPage(currentPage);
  }
});


document.getElementById('nextPage').addEventListener('click', () => {
  if (currentPage < totalPages) {
    currentPage++;
    showPage(currentPage);
  }
});


showPage(currentPage);

//tarjetitas
function mostrarDescripcion(id,datos,userId){
    tarjetita.classList.toggle("open");
    contentDesc.innerHTML=`
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



