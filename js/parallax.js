// Efecto Parallax en JavaScript
window.addEventListener('scroll', function() {
    const parallaxElements = document.querySelectorAll('.parallax');
    parallaxElements.forEach(function(element) {
        let scrollPosition = window.pageYOffset;
        element.style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
    });
});

// Puedes agregar más funciones para la búsqueda e interacción en search.html si lo deseas
