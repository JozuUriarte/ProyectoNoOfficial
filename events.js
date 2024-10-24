// Obtener todos los modales
var modals = document.querySelectorAll('.modal');

// Obtener todos los botones que abren los modales
var buttons = document.querySelectorAll('.openModal');

// Obtener el elemento <span> que cierra los modales
var closeButtons = document.getElementsByClassName("close");

// Cuando el usuario hace clic en cualquier botón, se abre el modal correspondiente
buttons.forEach(function(button) {
    button.onclick = function() {
        var modalId = this.getAttribute('data-modal');
        document.getElementById(modalId).style.display = "block"; // Muestra el modal correspondiente
    }
});

// Cuando el usuario hace clic en <span> (x), se cierra el modal correspondiente
Array.from(closeButtons).forEach(function(closeButton) {
    closeButton.onclick = function() {
        this.closest('.modal').style.display = "none"; // Oculta el modal correspondiente
    }
});

// Cuando el usuario hace clic en cualquier parte fuera del modal, se cierra
window.onclick = function(event) {
    modals.forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = "none"; // Oculta el modal correspondiente
        }
    });
}

