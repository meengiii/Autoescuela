window.addEventListener("load", function () {
    //contenido
    var nombrePerfil = document.querySelector(".nombreperfil");
    var idAlu = document.createElement("span");
    var info = document.getElementById("info-container");
    var btnAlu = document.getElementById("rolAlu");
    var btnProf = document.getElementById("rolProf");
    var btnAdmin = document.getElementById("rolAdmin");


    //funcionalidad
    idAlu.classList.add("id");
    info.style.display = "none";

    // Obtener la URL actual
    var url = new URL(window.location.href);

    // Obtener el valor del parámetro 'id'
    var menu = url.searchParams.get("menu");

    //listado
    function ActualizaListado() {

        // Borra los elementos existentes dentro de contenedorAlu
        var contenedorAlu = document.getElementById("alumnos-container");

        // Obtén el elemento h2 dentro de contenedorAlu
        var h2 = contenedorAlu.querySelector("h2");

        while (contenedorAlu.firstChild) {
            contenedorAlu.removeChild(contenedorAlu.firstChild);
        }

        // Vuelve a agregar el elemento h2
        contenedorAlu.appendChild(h2);

        fetch("http://virtual.localfj.com/vistas/plantillas/listadoAlu.html")
            .then(x => x.text())
            .then(y => {

                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var alumno = contenedor.querySelector('.alumno');
                fetch("http://virtual.localfj.com/API/apiUser.php?menu=" + menu)
                    .then(x => x.json())
                    .then(y => {
                        for (let i = 0; i < y.length; i++) {
                            var aluAux = alumno.cloneNode(true);
                            aluAux.getElementsByClassName("nombrelista")[0].innerHTML = y[i].nombre;
                            aluAux.getElementsByClassName("nombrelista")[0].setAttribute("data-id", y[i].id);
                            aluAux.setAttribute("data-id", y[i].id);

                            // Click
                            (function (elemento) {
                                elemento.addEventListener("click", function () {
                                    var id = elemento.dataset.id;
                                    fetch("http://virtual.localfj.com/API/apiUser.php?id=" + id)
                                        .then(x => x.json())
                                        .then(y => {
                                            info.style.display = "";
                                            nombrePerfil.textContent = y[0].nombre;
                                            nombrePerfil.value = id;
                                        });
                                });
                            })(aluAux);

                            contenedorAlu.appendChild(idAlu);
                            contenedorAlu.appendChild(aluAux);


                            // Eliminar
                            (function (elemento) {
                                var btnEliminar = elemento.querySelector(".btnEliminar");
                                btnEliminar.setAttribute("data-id", y[i].id);

                                btnEliminar.addEventListener("click", function () {
                                    var idR = this.dataset.id;
                                    var confirmacion = window.confirm("¿Estás seguro de que quieres eliminar este elemento?");
                                    // Oculta la fila antes de enviar la solicitud
                                    var ficha = document.querySelector('.alumno[data-id="' + idR + '"]');
                                    if (confirmacion) {
                                        if (ficha) {
                                            ficha.style.display = "none";
                                        }

                                        fetch("http://virtual.localfj.com/API/apiUser.php?id=" + idR, {
                                            method: "DELETE"
                                        })
                                            .then(x => x.text())
                                            .then(y => {
                                                console.log("usuario eliminado");
                                            })
                                            .finally(() => {
                                                info.style.display = "none";
                                            });
                                    }
                                });

                            })(aluAux);

                            //editar
                            (function (elemento) {
                                var btnEditar = elemento.querySelector(".btnEditar");
                                btnEditar.setAttribute("data-id", y[i].id);

                                const modal = document.getElementById('miModal');
                                const btnCerrarModal = document.getElementById('cerrarModal');
                                const btnGuardarCambios = document.getElementById('guardarCambios');

                                btnEditar.addEventListener('click', function () {
                                    var idR = this.dataset.id;
                                    fetch("http://virtual.localfj.com/API/apiUser.php?id=" + idR)
                                        .then(x => x.json())
                                        .then(y => {
                                            info.style.display = "none";
                                            var nombre = document.getElementById("nombre");
                                            nombre.value = y[0].nombre;
                                            nombre.setAttribute("data-id", y[0].id);
                                            var pass = document.getElementById("contrasena");
                                            pass.value = y[0].pass;
                                        });
                                    modal.style.display = 'block';
                                });

                                btnCerrarModal.addEventListener('click', function () {
                                    modal.style.display = 'none';
                                });

                                btnGuardarCambios.addEventListener('click', function () {

                                    var nombre = document.getElementById("nombre");
                                    var pass = document.getElementById("contrasena");
                                    var id = nombre.getAttribute("data-id");

                                    var alumno = {
                                        "nombre": nombre.value,
                                        "pass": pass.value
                                    };

                                    var alumnoDone = JSON.stringify(alumno);


                                    fetch("http://virtual.localfj.com/API/apiUser.php?modo=actualizar&id=" + id, {
                                        method: "PUT",
                                        body: alumnoDone
                                    })
                                        .then(x => x.text())
                                        .then(y => {
                                            console.log("alumno actualizado");
                                            var cambio = document.querySelector('.nombrelista[data-id="' + id + '"]');
                                            cambio.innerHTML = nombre.value;
                                        })


                                    // Finalmente, cierra la modal
                                    modal.style.display = 'none';
                                });

                            })(aluAux);



                        }
                    })



            })
    }
    ActualizaListado();

    //botones roles
    if (menu == "alta") {
        //boton de alumno
        btnAlu.addEventListener("click", function () {
            idR = nombrePerfil.value;

            // Oculta la fila antes de enviar la solicitud y actualizar la lista
            var ficha = document.querySelector('.alumno[data-id="' + idR + '"]');
            if (ficha) {
                ficha.style.display = "none";
            }

            fetch("http://virtual.localfj.com/API/apiUser.php?rol=alumno&id=" + idR, {
                method: "PUT"
            })
                .then(x => x.text())
                .then(y => {
                    console.log("rol de alumno");
                })

            // Oculta la información después de enviar la solicitud
            info.style.display = "none";
        });


        //boton de profesor
        btnProf.addEventListener("click", function () {
            idR = nombrePerfil.value;

            // Oculta la fila antes de enviar la solicitud y actualizar la lista
            var ficha = document.querySelector('.alumno[data-id="' + idR + '"]');
            if (ficha) {
                ficha.style.display = "none";
            }

            fetch("http://virtual.localfj.com/API/apiUser.php?rol=profesor&id=" + idR, {
                method: "PUT"
            })
                .then(x => x.text())
                .then(y => {
                    console.log("rol de profesor");
                })

            // Oculta la información después de enviar la solicitud
            info.style.display = "none";
        });

        //boton de admin
        btnAdmin.addEventListener("click", function () {
            idR = nombrePerfil.value;

            // Oculta la fila antes de enviar la solicitud y actualizar la lista
            var ficha = document.querySelector('.alumno[data-id="' + idR + '"]');
            if (ficha) {
                ficha.style.display = "none";
            }

            fetch("http://virtual.localfj.com/API/apiUser.php?rol=admin&id=" + idR, {
                method: "PUT"
            })
                .then(x => x.text())
                .then(y => {
                    console.log("rol de admin");
                })

            // Oculta la información después de enviar la solicitud
            info.style.display = "none";
        });

        var vLista = document.getElementById("irList");
        vLista.addEventListener("click", function () {
            document.location = "?menu=listalu&rol=admin";
        })


    } else if (menu == "listalu") {
        var vAlta = document.getElementById("irAlta");
        vAlta.addEventListener("click", function () {
            document.location = "?menu=alta&rol=admin";
        })
    }

});