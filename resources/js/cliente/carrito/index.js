import { agregarAlCarrito, obtenerProductoCarrito, eliminarDelCarrito, disminuirCantidad} from './store/store.carrito';

// * Se obtiene el elemento del carrito
const apartadoCarrito = document.querySelector('.center');
const listaCarrito = document.querySelector('.order-list');


// * Event listener para el carrito
apartadoCarrito.addEventListener('click', function(event){
    //  * Si no es un div, no se hace nada
    if (event.target.tagName !== 'DIV') return;
    // * Se obtiene el id del producto
    const idProducto = event.target.getAttribute('data-id');
    // * Se obtiene el precio del producto
    const textoPrecioNombre = event.target.querySelector('h3').textContent;
    const precio = parseFloat(textoPrecioNombre.split('$')[1]);
    // * Se obtiene el nombre del producto
    const nombre = textoPrecioNombre.split('-')[0].trim();
    // * Agregar el producto al carrito HTML
    agregarAlCarrito(idProducto, precio, nombre);
});

listaCarrito.addEventListener('click', function(event){
    console.log(event.target.tagName);
    // !! CAMBIAR O CHECARLO
    if (event.target.tagName !== 'BUTTON' && event.target.tagName !== 'IMG') return;
    const textoBoton = event.target.textContent;
    const idProducto = event.target.closest('[data-producto-id]').getAttribute('data-producto-id');
    const producto = obtenerProductoCarrito(idProducto);
    if (!textoBoton) {
        eliminarDelCarrito(producto);
    } else if(textoBoton === '+'){
        agregarAlCarrito(idProducto);
    }else{
        disminuirCantidad(idProducto);
    }
    console.log(textoBoton);
});


// * Evento para mandar a guardar a la base de datos
const botonGuardar = document.querySelector('.checkout');
botonGuardar.addEventListener('click', function(){
    // !!! FALTA MANDAR A GUARDAR EN LA BASE DE DATOS
    // * LOGICA DE GUARDAR EN LA BASE DE DATOS
    // fetch('/guardar-carrito', {


});


