window.addEventListener("load", function () 
{
    var select = document.getElementById("botonCat");
    fetch('http://virtual.localfj.com/API/apiCategoria.php')
        .then(x => x.json())
        .then(y => 
        {
            for (let i = 0; i < y.length; i++) 
            {
                opcion = document.createElement("option");
                opcion.value = y[i].id;
                opcion.text = y[i].nombre;
                select.appendChild(opcion);
            }
        })
})