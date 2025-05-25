
const listaCarrito = document.querySelector('.order-list');
const totalCarrito = document.querySelector('#total-carrito');

export const renderizarCarrito = (elementoCarrito) => {
    // * Crear el contenedor del nuevo producto al carrito
    const contenedor = document.createElement('div');
    contenedor.className = 'order-item';
    contenedor.dataset.productoId = elementoCarrito.id;

    contenedor.innerHTML = `
        <div class="info" data-producto-id="${elementoCarrito.id}">
            <p>${elementoCarrito.nombre}</p>
            <div>
                <button accion="-">−</button>
                <button accion="+">+</button>
                <span class="cantidad-producto">x1</span>
            </div>
        </div>
        <p class="price">$${elementoCarrito.precio}</p>
        <button class="delete" accion="eliminar">
            <img src="/Imagenes/Cliente/trash.png" alt="">
        </button>
    `;
    listaCarrito.appendChild(contenedor);
    // * Actualizar el total del carrito
    actualizarTotalCarrito(elementoCarrito.precio, '+');
}


export const renderizarCarritoModificarCantidad = (elementoCarrito, operador) => {
    // * Crear el contenedor del nuevo producto al carrito
    const contenedor = document.querySelector(`[data-producto-id="${elementoCarrito.id}"]`);
    const cantidadProducto = contenedor.querySelector('.cantidad-producto');
    // * Actualizar la cantidad del producto
    cantidadProducto.textContent = `x${elementoCarrito.cantidad}`;
    // * Obtener la etiqueta del precio
    const precioProducto = contenedor.querySelector('.price');
    precioProducto.textContent = `$${elementoCarrito.totalProducto}`;
    actualizarTotalCarrito(elementoCarrito.precio, operador);
}

export const renderizarCarritoEliminar = (elementoCarrito) => {
    // * Crear el contenedor del nuevo producto al carrito
    const contenedor = document.querySelector(`[data-producto-id="${elementoCarrito.id}"]`);
    // * Eliminar el producto del carrito
    contenedor.remove();
    // * Actualizar el total del carrito
    actualizarTotalCarrito(elementoCarrito.totalProducto, '-');
}


const actualizarTotalCarrito = (precioModificar, operador) => {
    let totalActual = parseFloat(totalCarrito.textContent.split('$')[1]);
    if (operador === '+') {
        totalActual += precioModificar;
    } else {
        totalActual -= precioModificar;
    }
    totalCarrito.textContent = `$ ${totalActual.toFixed(2)}`;
}


export const renderizarCarritoVacio = () => {
    // * Crear el contenedor del nuevo producto al carrito
    const contenedor = document.createElement('div');
    contenedor.className = 'order-item';
    contenedor.dataset.productoId = 'vacio';

    contenedor.innerHTML = `
        <div class="info">
            <p>Carrito Vacio</p>
        </div>
    `;
    listaCarrito.appendChild(contenedor);
}
