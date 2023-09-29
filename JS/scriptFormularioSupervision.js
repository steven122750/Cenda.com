



function obtenerFechaActual() {
    const fecha = new Date();
    const year = fecha.getFullYear();
    let month = fecha.getMonth() + 1; // Los meses comienzan desde 0
    let day = fecha.getDate();

    // Asegurarse de que el mes y el día tengan dos dígitos
    month = month < 10 ? `0${month}` : month;
    day = day < 10 ? `0${day}` : day;

    return `${year}-${month}-${day}`;
}

// Rellenar el campo de fecha con la fecha actual en formato yyyy-mm-dd
document.getElementById("fecha").value = obtenerFechaActual();


function agregarListener(selects, table, progressBar) {
    selects.forEach((select) => {
        select.addEventListener("change", () => {
            actualizarPorcentajes(selects, table, progressBar);
        });
    });
}

// Función para calcular el porcentaje y actualizar la barra de progreso
function actualizarPorcentajes(selects, table, progressBar) {
    const totalFilas = table.querySelectorAll("tbody tr").length;
    let totalUno = 0;

    selects.forEach((select) => {
        if (select.value === "1") {
            totalUno += 1;
        }
    });

    const porcentajeFila = 100 / totalFilas;
    const porcentaje = totalUno * porcentajeFila;

    progressBar.style.width = porcentaje + "%";
    progressBar.textContent = porcentaje.toFixed(2) + "%";

    // Cambia la clase de fondo de la barra de progreso basado en el porcentaje
    if (porcentaje <= 60) {
        progressBar.className = "progress-bar bg-danger";
    } else if (porcentaje < 80) {
        progressBar.className = "progress-bar bg-warning";
    } else {
        progressBar.className = "progress-bar bg-success";
    }
}


// Elementos de la tabla 1.sensorial
const selectst1 = document.querySelectorAll("select[id^='valoraciont1']");
const table1 = document.getElementById("sensorial");
const progressBar1 = document.getElementById("progress-bar-sensorial");

agregarListener(selectst1, table1, progressBar1);
actualizarPorcentajes(selectst1, table1, progressBar1);

// Elementos de la tabla 2.sonometría
const selectst2 = document.querySelectorAll("select[id^='valoraciont2']");
const table2 = document.getElementById("sonometria");
const progressBar2 = document.getElementById("progress-bar-sonometria");


agregarListener(selectst2, table2, progressBar2);
actualizarPorcentajes(selectst2, table2, progressBar2);


// Elementos de la tabla 3.gases
const selectst3 = document.querySelectorAll("select[id^='valoraciont3']");
const table3 = document.getElementById("gases");
const progressBar3 = document.getElementById("progress-bar-gases");

agregarListener(selectst3, table3, progressBar3);
actualizarPorcentajes(selectst3, table3, progressBar3);


// Elementos de la tabla 4.luces
const selectst4 = document.querySelectorAll("select[id^='valoraciont4']");
const table4 = document.getElementById("luces");
const progressBar4 = document.getElementById("progress-bar-luces");

agregarListener(selectst4, table4, progressBar4);
actualizarPorcentajes(selectst4, table4, progressBar4);

// Elementos de la tabla 5.frenos
const selectst5 = document.querySelectorAll("select[id^='valoraciont5']");
const table5 = document.getElementById("frenos");
const progressBar5 = document.getElementById("progress-bar-frenos");

agregarListener(selectst5, table5, progressBar5);
actualizarPorcentajes(selectst5, table5, progressBar5);

// Elementos de la tabla 6.criterios
const selectst6 = document.querySelectorAll("select[id^='valoraciont6']");
const table6 = document.getElementById("criterios");
const progressBar6 = document.getElementById("progress-bar-criterios");

agregarListener(selectst6, table6, progressBar6);
actualizarPorcentajes(selectst6, table6, progressBar6);


// Elementos de todas las tablas
const allSelects = document.querySelectorAll("select[id^='valoraciont']");

// Barra de progreso total
const totalProgressBar = document.getElementById("progress-bar-eficacia-total");

function actualizarPorcentajeTotal() {
    let totalSeleccionado = 0;

    allSelects.forEach((select) => {
        if (select.value === "1") {
            totalSeleccionado += 1;
        }
    });

    const porcentajeTotal = (totalSeleccionado / allSelects.length) * 100;

    console.log(allSelects.length);
    console.log(totalSeleccionado);

    totalProgressBar.style.width = porcentajeTotal + "%";
    totalProgressBar.textContent = porcentajeTotal.toFixed(2) + "%";

    // Cambia la clase de fondo de la barra de progreso basado en el porcentaje total
    if (porcentajeTotal <= 60) {
        totalProgressBar.className = "progress-bar bg-danger";
    } else if (porcentajeTotal < 80) {
        totalProgressBar.className = "progress-bar bg-warning";
    } else {
        totalProgressBar.className = "progress-bar bg-success";
    }
}

// Agregar un listener a todos los selects para actualizar el porcentaje total
allSelects.forEach((select) => {
    select.addEventListener("change", () => {
        actualizarPorcentajeTotal();
    });
});

// Llama a la función para calcular y actualizar el porcentaje total inicialmente
actualizarPorcentajeTotal();

