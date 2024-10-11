
const tarjetita=document.getElementById("cart");
const contentDesc=document.getElementById("cart-item");



function mostrarDescripcion(id,datos){
    tarjetita.classList.toggle("open");
    contentDesc.innerHTML=`
        <h2>${datos.nombre}</h2>
        
        <img src="${datos.img}" alt="Descripción imagen seleccionada">
        <div class="info">${datos.descripcion}</div>
    `;
}



