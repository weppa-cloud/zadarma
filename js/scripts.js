// Escuchar eventos del objeto Window
window.addEventListener("message", function (event) {
    if (!isJSONValid(event.data)) {
        console.error('Invalid JSON:', event.data);
        return;
    }

    // document.querySelector('.button-container').classList.remove('hidden');
    
    // Procesar los datos del evento
    eventData = JSON.parse(event.data);
    // cargarActividades();
});

