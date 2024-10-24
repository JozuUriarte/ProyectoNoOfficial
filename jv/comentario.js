"use strict";
const userId = {
    name: null,
    identity: null,
    image: null,
    message: null,
    date: null
};

const userComment = document.querySelector(".usercomment");
const publishBtn = document.querySelector("#publish");
const comments = document.querySelector(".comments");
const userName = document.querySelector(".user");

userComment.addEventListener("input", e => {
    if (!userComment.value) {
        publishBtn.setAttribute("disabled", "disabled");
        publishBtn.classList.remove("abled");
    } else {
        publishBtn.removeAttribute("disabled");
        publishBtn.classList.add("abled");
    }
});

publishBtn.addEventListener("click", addPost); // Aquí agrego el evento al botón

function addPost() {
    if (!userComment.value) return;
    userId.name = userName.value;
    if (userId.name === "Anonymous") {
        userId.identity = false;
        userId.image = "media/userDos.png";
    } else {
        userId.identity = true;
        userId.image = "media/user.png "; // Podrías cambiar esto si necesitas diferentes imágenes
    }
    userId.message = userComment.value;
    userId.date = new Date().toLocaleString();
    let published = `
    <div class="parents">
        <img src="${userId.image}" width="40px" height="40px">
        <div>
            <h1>${userId.name}</h1>
            <p>${userId.message}</p>
            <div class="engagements">
                <img src="media/like.png" width="40px" height="40px">
                <img src="media/share.png" width="40px" height="40px">
            </div>
            <span class="date">${userId.date}</span>
        </div>    
    </div>`;
    comments.innerHTML += published;
    userComment.value = ""; // Limpiar el campo de comentario
    publishBtn.setAttribute("disabled", "disabled"); // Deshabilitar el botón de nuevo
    publishBtn.classList.remove("abled");
}
