const galeria=[
    {id:1,nombre:"Capitan America",descripcion:"en proceso", image:"../img/capImage.jpg"},
    {id:2,nombre:"Goku",descripcion:"en proceso", image:"../img/gokuImage.jfif"},
    {id:3,nombre:"Iron Man",descripcion:"en proceso", image:"../img/ironManImage.webp"},
    {id:4,nombre:"Naruto",descripcion:"en proceso", image:"../img/narutoImage.webp"},
    {id:5,nombre:"Natsu",descripcion:"en proceso", image:"../img/natsuImage.jfif"},
    {id:6,nombre:"Thor",descripcion:"en proceso", image:"../img/thorImage.jfif"}
];
const marcos=document.getElementById("miGaleria");

function cargarCatologo(){
    //aqui se cargaran las tarjetitas correspondientes a los personajes
    marcos.innerHTML=galeria.map(carta=>`
            <div class="image-item">
                <img src="${carta.image}" alt="Descripción imagen 1">
                <h3 style="color:white">${carta.nombre}</h3>
                <div class="description">
                    <p>Ver descripcion</p>
                </div>
            </div>
        `).join("");
}


cargarCatologo();