const mostrarHora = () => {
    const reloj = document.getElementById('reloj-hora');
    if (!reloj) return;
    const ahora = new Date();
    let horas = ahora.getHours();
    const minutos = ahora.getMinutes().toString().padStart(2, '0');
    const ampm = horas >= 12 ? 'pm' : 'am';
    horas = horas % 12 || 12;
    reloj.textContent = `${horas}:${minutos} ${ampm}`;
}
setInterval(mostrarHora, 1000);
mostrarHora();
