window.addEventListener("load", function () {
    //contenido
    var dificultad = document.getElementById("botonDif");
    var categoria = document.getElementById("botonCat");
    var enunciado = document.getElementById("enunciado");
    var op1 = document.getElementById("opcion1");
    var op2 = document.getElementById("opcion2");
    var op3 = document.getElementById("opcion3");
    var correcta = document.getElementById("botonCor");
    var idPreg = document.createElement("span");

    //funcionalidad
    idPreg.classList.add("id");
    var imgGuardar = document.getElementById("guardar");
    var imgActualizar = document.getElementById("actualizar");
    var imgAgregar = document.getElementById("anadir");
    var imgBorrar = document.getElementById("borrar");
    imgActualizar.style.display = "none";
    imgBorrar.style.display = "none";

    //GUARDAR

    imgGuardar.addEventListener("click", function () {
        var pregunta = {
            "dif": dificultad.value,
            "cat": categoria.value,
            "enun": enunciado.value,
            "op1": op1.value,
            "op2": op2.value,
            "op3": op3.value,
            "cor": correcta.value
        };

        console.log(pregunta);

        var preguntaJson = JSON.stringify(pregunta);

        // Realiza la solicitud POST
        fetch("http://virtual.localfj.com/API/apiPregunta.php", {
            method: "POST",
            body: preguntaJson,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
            .then(x => x.text())
            .then(y => {

                // document.location = "?menu=crea";
                ActualizaListado();
                console.log("pregunta creada");

            })
    });


    //listado de preguntas:

    function ActualizaListado() {

        // Borra los elementos existentes dentro de contenedorPreg
        var contenedorPreg = document.getElementById("preguntas-container");

        // Obtén el elemento h2 dentro de contenedorPreg
        var h2 = contenedorPreg.querySelector("h2");

        while (contenedorPreg.firstChild) {
            contenedorPreg.removeChild(contenedorPreg.firstChild);
        }

        // Vuelve a agregar el elemento h2
        contenedorPreg.appendChild(h2);

        fetch("http://virtual.localfj.com/vistas/plantillas/listadoPreg.html")
            .then(x => x.text())
            .then(y => {
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var pregunta = contenedor.querySelector('.pregunta');
                fetch("http://virtual.localfj.com/API/apiPregunta.php")
                    .then(x => x.json())
                    .then(y => {
                        for (let i = 0; i < y.length; i++) {
                            var pregAux = pregunta.cloneNode(true);
                            pregAux.getElementsByClassName("enunciado")[0].innerHTML = y[i].enunciado;
                            pregAux.setAttribute("data-id", y[i].id);

                            (function (elemento) {
                                elemento.addEventListener("click", function () {
                                    var id = elemento.dataset.id;
                                    fetch("http://virtual.localfj.com/API/apiPregunta.php?id=" + id)
                                        .then(x => x.json())
                                        .then(y => {
                                            //mostrar y ocultar botones
                                            imgGuardar.style.display = "none";
                                            imgActualizar.style.display = "";
                                            imgBorrar.style.display = "";

                                            //dar los values
                                            idPreg.value = id;
                                            dificultad.value = y[0].idDificultad;
                                            categoria.value = y[0].idCategoria;
                                            enunciado.value = y[0].enunciado;
                                            op1.value = y[0].op1;
                                            op2.value = y[0].op2;
                                            op3.value = y[0].op3;
                                            correcta.value = y[0].correcta;
                                        })
                                });
                            })(pregAux);


                            contenedorPreg.appendChild(idPreg);
                            contenedorPreg.appendChild(pregAux);
                        }
                    })
            })
        limpiarTest();
    }

    ActualizaListado();



    //ACTUALIZAR

    imgActualizar.addEventListener("click", function () {
        id = document.querySelector(".id").value;
        var pregunta = {
            "id": id,
            "dif": dificultad.value,
            "cat": categoria.value,
            "enun": enunciado.value,
            "op1": op1.value,
            "op2": op2.value,
            "op3": op3.value,
            "cor": correcta.value
        };

        // console.log(pregunta);

        var preguntaJson = JSON.stringify(pregunta);

        // Realiza la solicitud POST
        fetch("http://virtual.localfj.com/API/apiPregunta.php?modo=actualizar", {
            method: "POST",
            body: preguntaJson,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
            .then(x => x.text())
            .then(y => {
                // document.location = "?menu=crea";
                ActualizaListado();
                console.log("pregunta actualizada");
            })
    });

    //AGREGAR

    imgAgregar.addEventListener("click", function () {
        //visibilidad
        imgGuardar.style.display = "";
        imgActualizar.style.display = "none";
        imgBorrar.style.display = "none";

        //todo a 0
        limpiarTest();
    });

    //BORRAR

    imgBorrar.addEventListener("click", function () {
        var borrar = document.querySelector(".id").value;

        // Realiza la solicitud DELETE
        fetch("http://virtual.localfj.com/API/apiPregunta.php?id=" + borrar, {
            method: "DELETE"
        })
            .then(x => x.text())
            .then(y => {

                // document.location = "?menu=crea";
                ActualizaListado();
                console.log("pregunta borrada");

            })
    });

    //que cuando se actualice borre o guarde todo se vuelva en blanco

    //poner a 0
    function limpiarTest() {
        dificultad.value = "";
        categoria.value = "";
        enunciado.value = "";
        op1.value = "";
        op2.value = "";
        op3.value = "";
        correcta.value = "";
    }


});