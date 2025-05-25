
const contenedorMesas = document.querySelector('.grid');
const contenedorFechas = document.querySelector('.izq');
let mesaSeleccionada = null;
const horaFinal = document.querySelector('.horaFinal');
const horaInicio = document.querySelector('.horaInicial');


contenedorMesas.addEventListener('click', function (event) {
    const elementoActual = event.target;
    // Si no es un div, no se hace nada
    if (elementoActual.tagName !== 'DIV' ||
        elementoActual.classList.contains('grid') ||
        elementoActual.getAttribute('data-status') !== 'disponible'
    ) return;
    console.log(event.target);
    if (elementoActual.tagName === mesaSeleccionada) return;
    // * Quitar selección anterior
    if (mesaSeleccionada) {
        mesaSeleccionada.classList.remove('mesa-seleccionada');
    }
    mesaSeleccionada = elementoActual;
    // * Seleccionar la nueva mesa
    elementoActual.classList.add('mesa-seleccionada');

    // * Actualizar el select
    const selectMesa = contenedorFechas.querySelector('select');
    // Actualizar el valor del select con la mesa seleccionada
    selectMesa.value = elementoActual.textContent.trim();
});


horaInicio.addEventListener('change', () => {
    const horaInicioValue = horaInicio.value;
    horaFinal.value = '';
    // Al cambiar la hora de inicio, la hora final será dos horas después
    const [h, m] = horaInicioValue.split(':').map(Number);
    let nuevaHora = h + 2;
    let nuevaMin = m;
    if (nuevaHora >= 24) {
        nuevaHora = nuevaHora % 24;
    }
    // Formatear con ceros a la izquierda
    const horaFinalStr = `${nuevaHora.toString().padStart(2, '0')}:${nuevaMin.toString().padStart(2, '0')}`;
    horaFinal.value = horaFinalStr;
});

contenedorFechas.addEventListener('change',  () => {
    copiarDatos('form-consultar');
    copiarDatos('form-reservar');
});

const copiarDatos = (formId) => {
    const form = document.getElementById(formId);
    form.querySelector('[name="date"]').value = document.getElementById('date').value;
    form.querySelector('[name="start_time"]').value = document.getElementById('start_time').value;
    form.querySelector('[name="end_time"]').value = document.getElementById('end_time').value;
    form.querySelector('[name="chart"]').value = document.getElementById('chart').value;
}


