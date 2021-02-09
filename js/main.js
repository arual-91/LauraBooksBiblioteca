function validarLogin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            var validateReponse = JSON.parse(this.response); //transforma la respuesta en una variable arrayde javascript

            if (validateReponse["result"] == true) {
                location.reload();

            } else {
                var p = document.getElementById("erroLogin");
                var message = validateReponse["message"];
                p.innerHTML = message;
            }
        }
    };

    xhttp.open("POST", "api/validateLogin.php", true);
    var formdata = new FormData(document.getElementById("login-form"))
    xhttp.send(formdata);
    // para que no se siga el link que llama a esta función
    return false;
}

function openMenu(evt, menu) {
    // Declaramos variable
    var i, tabcontent, tablinks;

    // obtenemos los elementos con class="tabcontent" y lo ocultamos
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // obtenemos los elementos con class="tablinks" y lo eliminamos de la clase "activo"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Muestra la pestaña actual y agrega una clase "activa" al botón que abrió la pestaña
    document.getElementById(menu).style.display = "block";
    evt.currentTarget.className += " active";
}

function mostrarSugerencias(str) {
    if (str.length == 0) { //si no hemos escrito nada en el input, las sugerencias nos van a salir vacías.
        document.getElementById('salida').innerHTML = '';
    } else {
        // AJAX REQ
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('salida').innerHTML = this.responseText; //modificamos la etiqueta con la ID salida para que nos salga la respuesta obtenida
            }
        }
        xmlhttp.open("GET", "api/sugerencias.php?q=" + str, true);
        xmlhttp.send();
    }
}

function ValidarRegistro() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            var validateReponse = JSON.parse(this.response); //transforma la respuesta en una variable arrayde javascript

            if (validateReponse["result"] == true) {
                alert('Registro realizado con exito');
                window.location = 'account.php';


            } else {
                var p = document.getElementById("erroRegister");
                var message = validateReponse["message"];
                p.innerHTML = message;
            }
        }
    };

    xhttp.open("POST", "api/validateRegister.php", true);
    var formdata = new FormData(document.getElementById("register-form"))
    xhttp.send(formdata);
    // para que no se siga el link que llama a esta función
    return false;
}

function ValidarAddBook() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            var validateReponse = JSON.parse(this.response); //transforma la respuesta en una variable arrayde javascript

            if (validateReponse["result"] == true) {
                var fila = document.createElement("tr");
                var tabla = document.getElementById("tableBook");
                var namColums = tabla.getElementsByTagName("th");
                for (i = 0; i < namColums.length; i++) {
                    switch (namColums[i].innerHTML) {
                        case "Titulo":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["titulo"];
                            fila.appendChild(column);
                            break;
                        case "Editorial":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["editorial"];
                            fila.appendChild(column);
                            break;
                        case "Genero":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["genero"];
                            fila.appendChild(column);
                            break;
                        case "Fecha Publicacion":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["fechaPublicacion"];
                            fila.appendChild(column);
                            break;
                        case "Autor":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["autor"];
                            fila.appendChild(column);
                            break;
                        case "ID LIBRO":
                            var column = document.createElement("td");
                            column.innerHTML = validateReponse["idBook"];
                            fila.appendChild(column);
                            break;
                    }
                }

                tabla.appendChild(fila);
                alert('Libro añadido con exito');


            } else {
                var message = validateReponse["message"];
                alert(message);
            }
        }
    };

    xhttp.open("POST", "api/validateAddBook.php", true);
    var formdata = new FormData(document.getElementById("addBook-form"))
    xhttp.send(formdata);
    // para que no se siga el link que llama a esta función
    return false;
}


function ValidarDeleteBook() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            var validateReponse = JSON.parse(this.response); //transforma la respuesta en una variable arrayde javascript

            if (validateReponse["result"] == true) {
                var namColums = document.getElementsByTagName("th");
                var filas = document.getElementsByTagName("tr");
                var columID;

                for (i = 0; i < namColums.length; i++) {
                    if (namColums[i].innerHTML == "ID LIBRO") {
                        columID = i;
                        break;
                    }
                }

                for (i = 1; i < filas.length; i++) {
                    var contentColum = filas[i].getElementsByTagName("td")[columID].innerHTML;
                    if (contentColum == validateReponse["id"]) {
                        filas[i].remove();
                        alert('Libro borrado con exito');
                    }
                }
            } else {
                var message = validateReponse["message"];
                alert(message);
            }
        }
    };

    xhttp.open("POST", "api/validateDeleteBook.php", true);
    var formdata = new FormData(document.getElementById("deleteBook-form"))
    xhttp.send(formdata);
    // para que no se siga el link que llama a esta función
    return false;
}