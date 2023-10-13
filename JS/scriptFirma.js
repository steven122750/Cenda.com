// Obtén una referencia al canvas y sus botones
const canvas = document.getElementById('signature-pad');
const clearButton = document.getElementById('clear-button');
const saveButton = document.getElementById('save-button');
const savedSignatureImage = document.getElementById('saved-signature');

// Obtiene el contexto 2D del canvas
const ctx = canvas.getContext('2d');

let drawing = false;
let lastX = 0;
let lastY = 0;

// Guarda el ancho de línea original
const originalLineWidth = 3 * window.devicePixelRatio;
ctx.lineWidth = originalLineWidth; 

function configurar() {
    // Ajusta el tamaño del canvas para que coincida con el tamaño de la pantalla
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Ajusta la escala del contexto para que coincida con la escala del dispositivo
    const scale = window.devicePixelRatio;
    ctx.scale(scale, scale);

    // Ajusta el ancho de la línea y el estilo de trazo
    ctx.lineWidth = 3 * scale; // Aumenta el ancho de la línea en función de la escala del dispositivo
    ctx.strokeStyle = '#000';

    canvas.addEventListener('mousedown', (e) => {
        drawing = true;
        [lastX, lastY] = getMousePos(canvas, e);
    });

    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', () => drawing = false);
    canvas.addEventListener('mouseout', () => drawing = false);
}

// Función para dibujar en el lienzo
function draw(e) {
    if (!drawing) return;

    const [mouseX, mouseY] = getMousePos(canvas, e);

    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(mouseX, mouseY);
    ctx.stroke();

    [lastX, lastY] = [mouseX, mouseY];
}

// Función para obtener las coordenadas del mouse con respecto al lienzo
function getMousePos(canvas, e) {
    const rect = canvas.getBoundingClientRect();
    return [(e.clientX - rect.left) * (canvas.width / rect.width), (e.clientY - rect.top) * (canvas.height / rect.height)];
}

// Llama a configurar para agregar escuchas de eventos
configurar();


saveButton.addEventListener('click', (e) => {
    e.preventDefault();

    const signatureDataURL = canvas.toDataURL();
    savedSignatureImage.src = signatureDataURL;

    // Posiciona la imagen de la firma encima del guion
    const inspectorLine = document.getElementById('inspectorLine');
    const signatureImage = document.querySelector('.signature-image');
    signatureImage.style.display = 'block';
    signatureImage.style.position = 'absolute';
    signatureImage.style.top = '50%';

    // Ajusta la imagen horizontalmente para centrarla
    const containerWidth = inspectorLine.offsetWidth;
    const imageWidth = signatureImage.offsetWidth;
    const leftPosition = (containerWidth - imageWidth) / 2;
    signatureImage.style.left = leftPosition + 'px';

    signatureImage.style.transform = 'translate(0, -50%)';
    signatureImage.style.zIndex = '2';

    // Oculta el canvas después de guardar la firma
    canvas.style.display = 'none';

    // Oculta la línea (guion) después de guardar la firma
    inspectorLine.style.display = 'none';

    // Oculta completamente el div 'inspectorDiv' después de guardar la firma
    const inspectorDiv = document.getElementById('inspectorDiv');
    inspectorDiv.style.display = 'none';

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




const resetButton = document.getElementById('reset-button');

resetButton.addEventListener('click', (e) => {
    e.preventDefault();

    // Limpia el contenido del canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Restablece las variables de rastreo del dibujo
    drawing = false;
    lastX = 0;
    lastY = 0;

    // Restaura el ancho de línea original
    ctx.lineWidth = originalLineWidth;

    // Muestra el canvas nuevamente
    canvas.style.display = 'block';

    // Muestra la línea (guion) nuevamente
    const inspectorLine = document.getElementById('inspectorLine');
    inspectorLine.style.display = 'block';

    // Oculta la imagen de la firma
    savedSignatureImage.style.display = 'none';

    savedSignatureImage.src = '';  // Agrega aquí la URL de la imagen de la firma si es necesario
});