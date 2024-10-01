// Efecto Parallax en JavaScript
window.addEventListener('scroll', function() {
    const parallaxElements = document.querySelectorAll('.parallax');
    parallaxElements.forEach(function(element) {
        let scrollPosition = window.screenY;
        element.style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
    });
});



let datoNombre;
let datoCorreo;
let datoEdad;
let pFavorito;
let usuarioGuardado=false;


let posiblePersonaje="";

function validarNombre(){
    let correcto=true;
    let posibleNombre=document.getElementById("nombre").value;
    const eNombre=document.getElementById("nombreError");
    
    if(posibleNombre.trim().length<3){
        correcto=false;
        eNombre.textContent="El nombre tiene que tener al menos 3 caracteres";
    }else{
        datoNombre=posibleNombre;
        eNombre.textContent="";
        correcto=true;
    }
    return correcto;
}

function validarCorreo(){
    let correcto=true;
    let posibleCorreo=document.getElementById("email").value;
    const eCorreo=document.getElementById("correoError");
    
    let eRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!eRegex.test(posibleCorreo.trim())){
        correcto=false;
        eCorreo.textContent="El formato de correo que ha ingresado es incorrecto";
    }else{
        datoCorreo=posibleCorreo;
        eCorreo.textContent="";
        correcto=true;
    }
    
    return correcto;
}

function validarEdad(){
    let correcto=true;
    let posibleEdad=document.getElementById("edad").value;
    const eEdad=document.getElementById("edadError");
    
    if(posibleEdad<12 || posibleEdad>120){
        correcto=false;
        eEdad.textContent="Tiene que ser mayor de 12 o no haber sobrebibido a la Pepa"
    }else{
        datoEdad=posibleEdad;
        eEdad.textContent="";
        correcto=true;
    }
    
    return correcto;
}

function guardarUsuario(){
    pFavorito=document.getElementById("personaje").value;
    let miUsuario=[{
        nombre:datoNombre,
        edad:datoEdad,
        correo:datoCorreo,
        personajeFavorito:pFavorito
    }];
    console.log(miUsuario[0]);
    localStorage.setItem("usu",JSON.stringify(miUsuario));
}

document.getElementById("nombre").addEventListener("input",validarNombre);
document.getElementById("email").addEventListener("input",validarCorreo);
document.getElementById("edad").addEventListener("input",validarEdad);

function envioDatos(){
    if(validarNombre() && validarCorreo() && validarEdad()){
        guardarUsuario();
        usuarioGuardado=true;
        localStorage.setItem("registrado",usuarioGuardado);
        cargarSesion();
        alert("El usuario se ha registrado con exito. Ya puede visitar nuestro catalogo");
    }
    
}

document.getElementById("envioDatos").addEventListener("submit",function (event){
    event.preventDefault();
    console.log("se envia");
    envioDatos();
});


function abrirCatalogo(){
    window.location.href="busqueda.html"
    if(localStorage.getItem("registrado")){
        window.location.href="busqueda.html";
    }else{
        const noRegistro=document.getElementById("sinRegistro");
        noRegistro.innerHTML="Necesitas Registrarte para acceder al catalogo";
    }
    
}
// function cargarSesion(){
//     if(localStorage.getItem("registrado")){
//         document.getElementById("confi").innerHTML=`
//             Hola ${localStorage.getItem(usu)[0].nombre}
//             <button onclick="cerrarSesion()">Cerrar Sesion</button>
//         `;
//     }else{
//         document.getElementById("confi").innerHTML=``;
//     }
// }
// function cerrarSesion(){
//     localStorage.setItem("registrado",false)
// }







