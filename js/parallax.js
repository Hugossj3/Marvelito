const registro=document.getElementById("formu-registro");
const acceso=document.getElementById("acceso");
const dentro=document.getElementById("registrado");
// Efecto Parallax en JavaScript
window.addEventListener('scroll', function() {
    const parallaxElements = document.querySelectorAll('.parallax');
    parallaxElements.forEach(function(element) {
        let scrollPosition = window.screenY;
        element.style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
    });
});

function abrirRegistro(){
    event.preventDefault();
    registro.style.display="block";
    acceso.style.display="none";
    dentro.style.display="none";
}

let datoNombre;
let datoCorreo;
let datoEdad;
let contra;
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
    contra=document.getElementById("personaje").value;
    let miUsuario=[{
        nombre:datoNombre,
        edad:datoEdad,
        correo:datoCorreo,
        personajeFavorito:contra
    }];
    console.log(miUsuario[0]);
    localStorage.setItem("usu",JSON.stringify(miUsuario));
}

document.getElementById("nombre").addEventListener("input",validarNombre);
document.getElementById("email").addEventListener("input",validarCorreo);
document.getElementById("edad").addEventListener("input",validarEdad);

function envioDatos(){
    if(validarNombre() && validarCorreo() && validarEdad()){
        
    }
    
}

document.getElementById("envioDatos").addEventListener("submit",function (event){
    event.preventDefault();
    console.log("se envia");
    envioDatos();
});


function abrirCatalogo(){
    window.location.href="busqueda.php";
    if(localStorage.getItem("registrado")){
        window.location.href="busqueda.php";
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







