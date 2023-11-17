function mostrarMenu() {
    var menu = document.getElementById('menuDesplegable');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}


document.addEventListener('click', function (event) 
{
    var menu = document.getElementById('menuDesplegable');
    if (event.target !== document.getElementById('imagenDerecha')) 
    {
        menu.style.display = 'none';
    }
});
