document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form-reservar');
    if (!form) return;

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Copiar valores a los hidden
        form.elements['date'].value = document.getElementById('date').value;
        form.elements['start_time'].value = document.getElementById('start_time').value;
        form.elements['end_time'].value = document.getElementById('end_time').value;
        form.elements['chart'].value = document.getElementById('chart').value;

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(async response => {
            if (!response.ok) {
                if (response.status === 422) {
                    const data = await response.json();
                    alert(data.message || 'Por favor revisa los campos.');
                    return;
                } else {
                    throw new Error('Error desconocido');
                }
            }
            return response.json();
        })
        .then(data => {
            if (!data) return;
            if (data.success) {
                alert('¡Reservación realizada con éxito!');
                // form.reset();
            } else {
                alert(data.message || 'Error al guardar la reservación.');
            }
        })
        .catch(() => {
            alert('Error de red o del servidor al guardar la reservación.');
        });
    });
});
