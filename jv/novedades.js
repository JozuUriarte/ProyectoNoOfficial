let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if(slideIndex>slides.length){slideIndex=1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 9000);
}


/*cartas*/
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



//acodeon

function toggleAccordion(header) {
  const content = header.nextElementSibling;
  
  // Cambiar la visibilidad del contenido
  if (content.style.display === "block") {
      content.style.display = "none"; // Ocultar
  } else {
      content.style.display = "block"; // Mostrar
  }
}
