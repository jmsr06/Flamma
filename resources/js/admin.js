const contenedor = document.querySelector('#contenedor1');

document.querySelector('#boton-menu').addEventListener('click', () => {
    contenedor.classList.toggle('active');
});

const comprobarAncho = () => {
    if (window.innerWidth <= 768) {
        contenedor.classList.remove('active');
    } else {
        contenedor.classList.add('active');
    }
}
window.addEventListener('resize', comprobarAncho);
document.addEventListener('load', comprobarAncho);