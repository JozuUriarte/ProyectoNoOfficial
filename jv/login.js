    // JavaScript para abrir y cerrar el modal
    var modal = document.getElementById("loginModal");
    var btn = document.getElementById("openLoginModal");
    var span = document.getElementsByClassName("closett")[0];

    btn.onclick = function(event) {
        event.preventDefault(); // Evita el comportamiento predeterminado del enlace
        modal.style.display = "block";
        cargarContenidoLogin();
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function cargarContenidoLogin() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "login.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementById("modalContentt").innerHTML = xhr.responseText;
                } else {
                    console.error("Error al cargar el contenido: " + xhr.status); // Mensaje de error
                }
            }
        };
        xhr.send();
    }