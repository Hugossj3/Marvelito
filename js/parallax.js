// Efecto Parallax en JavaScript
window.addEventListener('scroll', function() {
    const parallaxElements = document.querySelectorAll('.parallax');
    parallaxElements.forEach(function(element) {
        let scrollPosition = window.screenY;
        element.style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
    });
});

let nombre;
let correo;
let edad;
let pFavorito;

let posibleNombre=document.getElementById("nombre").value;
let posibleCorreo=document.getElementById("email").value;
let posibleEdad=Number(document.getElementById("edad").value);
let posiblePersonaje=document.getElementById("personaje").value;

if(posibleNombre.lenght){

}
