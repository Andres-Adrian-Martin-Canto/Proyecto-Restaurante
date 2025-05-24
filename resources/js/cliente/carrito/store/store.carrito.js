import { renderizarCarrito, renderizarCarritoModificarCantidad, renderizarCarritoEliminar } from '../render-carrito/render.carrito';

const carrito = [];


export const agregarAlCarrito = (productoId, precio, nombre) => {
    const productoExistente = carrito.find(item => item.id === productoId);
    if (productoExistente) {
        productoExistente.cantidad += 1;
        productoExistente.totalProducto += productoExistente.precio;
        // * Actualizar la cantidad del producto en el carrito HTML
        renderizarCarritoModificarCantidad(productoExistente, '+');
    } else {
        // * Agregar el producto al carrito
        const nuevoProducto = { id: productoId, cantidad: 1, precio: precio, nombre: nombre, totalProducto: precio };
        carrito.push(nuevoProducto);
        // * Agregar el producto al carrito HTML
        renderizarCarrito(nuevoProducto);
    }
}

export const disminuirCantidad = (productoId) => {
    const productoExistente = carrito.find(item => item.id === productoId);
    if (productoExistente.cantidad > 1) {
        productoExistente.cantidad -= 1;
        productoExistente.totalProducto -= productoExistente.precio;
        // * Llamar a modificar la cantidad del producto en el carrito HTML
        renderizarCarritoModificarCantidad(productoExistente, '-');
    } else{
        eliminarDelCarrito(obtenerProductoCarrito(productoId));
    }
}

export const eliminarDelCarrito = ([producto, indice]) => {
    renderizarCarritoEliminar(producto);
    carrito.splice(indice, 1);
    console.table(carrito);
}

export const obtenerProductoCarrito = (idProducto) => {
    return [carrito.find(item => item.id === idProducto), carrito.findIndex(item => item.id === idProducto)];
}


