const registro = document.getElementById("formu-registro");
const acceso = document.getElementById("acceso");
const dentro = document.getElementById("registrado");
let iniciado = document.getElementById("iniciado").value;
let nombreUsu = document.getElementById("nUsu").value;
// Efecto Parallax en JavaScript
window.addEventListener('scroll', function () {
    const parallaxElements = document.querySelectorAll('.parallax');
    parallaxElements.forEach(function (element) {
        let scrollPosition = window.screenY;
        element.style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
    });
});




//muestra un mensaje
let info = document.getElementById("infor")
if (info) {
    info.style.display = "block"
    setTimeout(() => {
        info.style.display = "none"
    }, 3000);
}

//regresa al formulario de inicio de sesion
function volver() {
    event.preventDefault();
    registro.style.display = "none";
    acceso.style.display = "block";
    dentro.style.display = "none";
}

//accede al formulario de registro
function abrirRegistro() {
    event.preventDefault();
    registro.style.display = "block";
    acceso.style.display = "none";
    dentro.style.display = "none";
}
console.log(iniciado)

let datoNombre;
let datoCorreo;
let datoEdad;
let contra;
let usuarioGuardado = false;


//validacion del nombre
function validarNombre() {
    let correcto = true;
    let posibleNombre = document.getElementById("nombre").value;
    const eNombre = document.getElementById("nombreError");

    if (posibleNombre.trim().length < 3) {
        correcto = false;
        eNombre.textContent = "El nombre tiene que tener al menos 3 caracteres";
    } else {
        datoNombre = posibleNombre;
        eNombre.textContent = "";
        correcto = true;
    }
    return correcto;
}

//validacion del correo
function validarCorreo() {
    let correcto = true;
    let posibleCorreo = document.getElementById("email").value;
    const eCorreo = document.getElementById("correoError");



    let eRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!eRegex.test(posibleCorreo)) {
        correcto = false;
        eCorreo.textContent = "El formato de correo que ha ingresado es incorrecto";
    } else {
        datoCorreo = posibleCorreo;
        eCorreo.textContent = "";
        correcto = true;
    }

    return correcto;
}
//validacion de la edad
function validarEdad() {
    let correcto = true;
    let posibleEdad = document.getElementById("edad").value;
    const eEdad = document.getElementById("edadError");

    if (posibleEdad < 12 || posibleEdad > 120) {
        correcto = false;
        eEdad.textContent = "Tiene que ser mayor de 12 o no haber sobrebibido a la Pepa"
    } else {
        datoEdad = posibleEdad;
        eEdad.textContent = "";
        correcto = true;
    }

    return correcto;
}

//validacion de la contra
function validarContra() {
    let correcto = true;
    let posibleContra = document.getElementById("contra").value;
    const eContra = document.getElementById("contraError");
    if (posibleContra.length < 3) {
        correcto = false;
        eContra.textContent = "La contraseña tiene que ser mas larga"
    } else {
        contra = posibleContra
        eContra.textContent = "";
        correcto = true;
    }

    return correcto;
}

//informa al usuario si esta introduciendo bien los datos
document.getElementById("nombre").addEventListener("input", validarNombre);
document.getElementById("email").addEventListener("input", validarCorreo);
document.getElementById("edad").addEventListener("input", validarEdad);
document.getElementById("contra").addEventListener("input", validarContra);



function envioDatos() {

    if (validarNombre() && validarCorreo() && validarEdad() && validarContra()) {
        

        fetch("includes/newUser.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nombre=${encodeURIComponent(datoNombre)}&edad=${encodeURIComponent(datoEdad)}&email=${encodeURIComponent(datoCorreo)}&contra=${contra}`
        })
            .then(
                location.reload()
            )
    } else {
        alert("Los datos no son los correctos")
    }

}

//envia los datos de registro y solicita acceso
document.getElementById("envioDatos").addEventListener("submit", function (event) {
    event.preventDefault();
    console.log("se envia");
    envioDatos();
});


//accede al catalogo si hay un usuario registrado
function abrirCatalogo() {
    if (iniciado == 1) {
        window.location.href = "./busqueda.php";
    } else {
        const noRegistro = document.getElementById("sinRegistro");
        noRegistro.innerHTML = "Necesitas Registrarte para acceder al catalogo";
    }

}


//accede a un boton que permite al usuario cerrar sesion
if (iniciado == 1) {
    registro.style.display = "none";
    acceso.style.display = "none";
    dentro.style.display = "block";
    document.getElementById("confi").innerHTML = `
                    Hola ${nombreUsu}
                     <button onclick="cerrarSesion()">Cerrar Sesion</button>`
}

//carga un cierre de sesion
function cerrarSesion() {
    window.location.href = "includes/logout.php";
}








