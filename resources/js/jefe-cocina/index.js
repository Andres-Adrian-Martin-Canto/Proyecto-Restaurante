
const contenedorcards = document.querySelector('.contenedor-card');

contenedorcards.addEventListener('change', function () {
    const nuevoEstado = event.target.value;
    const comandaId = event.target.dataset.comandaId; // Asegúrate de tener data-comanda-id en el elemento

    fetch('/cocina/actualizarEstadoComanda', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            comanda_id: comandaId,
            estado: nuevoEstado // debe ser 'listo' o 'cancelado'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Cambio de estado del pedido');
            location.reload();
        } else {
            alert(data.message || 'No se pudo realizar el cambio');
            location.reload();
        }
    })
    .catch(error => {
        alert('No se pudo realizar el cambio');
        location.reload();
        console.error('Error:', error);
    });
});

