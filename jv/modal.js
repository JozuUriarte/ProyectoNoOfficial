const openSnackModal = document.querySelector('#snack-btn');
const openTradicionalModal = document.querySelector('#tradicional-btn');
const openInternacionalModal = document.querySelector('#internacional-btn');
const openTragosModal = document.querySelector('#tragos-btn');
const openGaseosasModal = document.querySelector('#gaseosas-btn');
const openJugosModal = document.querySelector('#jugos-btn');
const openOtrosModal = document.querySelector('#otros-btn');


const modalSnack = document.querySelector('.modal-snack');
const modalTradicional = document.querySelector('.modal-tradicional');
const modalInternacional = document.querySelector('.modal-internacional');
const modalTragos = document.querySelector('.modal-tragos');
const modalGaseosas = document.querySelector('.modal-gaseosas');
const modalJugos = document.querySelector('.modal-jugos');
const modalOtros = document.querySelector('.modal-otros');

const closedModal = document.querySelectorAll('.modal-close');

// Abrir modal correspondiente
openSnackModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalSnack.classList.add('modal--show');
});

openTradicionalModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalTradicional.classList.add('modal--show');
});

openInternacionalModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalInternacional.classList.add('modal--show');
});

openTragosModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalTragos.classList.add('modal--show');
});

openGaseosasModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalGaseosas.classList.add('modal--show');
});

openJugosModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalJugos.classList.add('modal--show');
});

openOtrosModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalOtros.classList.add('modal--show');
});


// Cerrar todos los modales
closedModal.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelectorAll('.modal').forEach(modal => modal.classList.remove('modal--show'));
    });
});