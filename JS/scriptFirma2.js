// Obtén una referencia al canvas y sus botones para el div del director técnico
const canvasDirector = document.getElementById('signature-pad1');
const clearButtonDirector = document.getElementById('clear-button1');
const saveButtonDirector = document.getElementById('save-button1');
const resetButtonDirector = document.getElementById('reset-button1');
const clearMessageDirector = document.getElementById('clear-message1');


// Obtiene el contexto 2D del canvas del director técnico
const ctxDirector = canvasDirector.getContext('2d');

let drawingDirector = false;
let lastXDirector = 0;
let lastYDirector = 0;

// Guarda el ancho de línea original para el director técnico
const originalLineWidthDirector = 3 * window.devicePixelRatio;
ctxDirector.lineWidth = originalLineWidthDirector;

// Función para configurar el canvas del director técnico
function configurarDirector() {
    // Ajusta el tamaño del canvas para que coincida con el tamaño de la pantalla
    canvasDirector.width = window.innerWidth;
    canvasDirector.height = window.innerHeight;

    // Ajusta la escala del contexto para que coincida con la escala del dispositivo
    const scale = window.devicePixelRatio;
    ctxDirector.scale(scale, scale);

    // Ajusta el ancho de la línea y el estilo de trazo
    ctxDirector.lineWidth = 3 * scale; // Aumenta el ancho de la línea en función de la escala del dispositivo
    ctxDirector.strokeStyle = '#000';

    canvasDirector.addEventListener('mousedown', (e) => {
        drawingDirector = true;
        [lastXDirector, lastYDirector] = getMousePos(canvasDirector, e);
    });

    canvasDirector.addEventListener('mousemove', drawDirector);
    canvasDirector.addEventListener('mouseup', () => drawingDirector = false);
    canvasDirector.addEventListener('mouseout', () => drawingDirector = false);
}

// Función para dibujar en el lienzo del director técnico
function drawDirector(e) {
    if (!drawingDirector) return;

    const [mouseXDirector, mouseYDirector] = getMousePos(canvasDirector, e);

    ctxDirector.beginPath();
    ctxDirector.moveTo(lastXDirector, lastYDirector);
    ctxDirector.lineTo(mouseXDirector, mouseYDirector);
    ctxDirector.stroke();

    [lastXDirector, lastYDirector] = [mouseXDirector, mouseYDirector];
}

// Función para obtener las coordenadas del mouse con respecto al lienzo
function getMousePos(canvas, e) {
    const rect = canvas.getBoundingClientRect();
    return [(e.clientX - rect.left) * (canvas.width / rect.width), (e.clientY - rect.top) * (canvas.height / rect.height)];
}

// Llama a configurar para agregar escuchas de eventos para el director técnico
configurarDirector();

// Agrega un evento al botón "Guardar firma" del director técnico

saveButtonDirector.addEventListener('click', (e) => {
    e.preventDefault();

    const signatureDataURL = canvasDirector.toDataURL();
    savedSignatureImage.src = signatureDataURL;

    // Posiciona la imagen de la firma encima del guion
    const directorLine = document.getElementById('directorLine');
    const signatureImage = document.querySelector('.signature-image1');
    signatureImage.style.display = 'block';
    signatureImage.style.position = 'absolute';
    signatureImage.style.top = '50%';

    // Ajusta la imagen horizontalmente para centrarla
    const containerWidth = directorLine.offsetWidth;
    const imageWidth = signatureImage.offsetWidth;
    const leftPosition = (containerWidth - imageWidth) / 2;
    signatureImage.style.left = leftPosition + 'px';

    signatureImage.style.transform = 'translate(0, -50%)';
    signatureImage.style.zIndex = '2';

    // Oculta el canvas después de guardar la firma
    canvas.style.display = 'none';

    // Oculta la línea (guion) después de guardar la firma
    directorLine.style.display = 'none';

    // Oculta completamente el div 'inspectorDiv' después de guardar la firma
    const directorDiv = document.getElementById('directorDiv');
    directorDiv.style.display = 'none';

    // Limpia el contenido del canvas y restablece el contexto 2D
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;

    // Restablece las variables de rastreo del dibujo
    drawing = false;
    lastX = 0;
    lastY = 0;

    signatureImage.style.left = leftPosition + 'px';
});


// Agrega un evento al botón "Reiniciar firma" del director técnico
resetButtonDirector.addEventListener('click', (e) => {
    e.preventDefault();

    // Limpia el contenido del canvas
    ctxDirector.clearRect(0, 0, canvasDirector.width, canvasDirector.height);

    // Restablece las variables de rastreo del dibujo
    drawingDirector = false;
    lastXDirector = 0;
    lastYDirector = 0;

    // Restaura el ancho de línea original
    ctxDirector.lineWidth = originalLineWidthDirector;

    // Muestra el botón "Borrar firma"
    clearButtonDirector.style.display = 'inline-block';

    // Oculta el mensaje de limpieza
    clearMessageDirector.style.display = 'none';

    // Oculta el canvas después de reiniciar la firma
    canvasDirector.style.display = 'block';

    // ... (Agrega aquí cualquier otra acción que necesites)
});
