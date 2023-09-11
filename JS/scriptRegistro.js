
pasarDatos();
filtrarTabla();
agregarEvento();


function pasarDatos(){
    document.addEventListener('DOMContentLoaded', () => {
        // Obtener todas las filas de la tabla
        const filas = document.querySelectorAll('tr');
        
        // Recorrer cada fila y agregar un controlador de eventos clic
        filas.forEach(fila => {
            fila.addEventListener('click', () => {
                // Obtener los datos de la fila seleccionada
                const nombre = fila.querySelector('td:nth-child(2)').textContent;
                const documento = fila.querySelector('td:nth-child(3)').textContent;
    
                // Actualizar los campos del formulario con los datos
                document.getElementById('form3Example4').value = nombre;
                document.getElementById('form3Example3').value = documento;
            });
        });
    });
}

function filtrarTabla(){
$(document).ready(function () {
    $("#documentoInput, #nombreInput").on("keyup", function () {
        var documentoValue = $("#documentoInput").val().toLowerCase();
        var nombreValue = $("#nombreInput").val().toLowerCase();

        $("table tbody tr").filter(function () {
            var documentoText = $(this).find("td:eq(1)").text().toLowerCase();
            var nombreText = $(this).find("td:eq(0)").text().toLowerCase();
            
            // Show the row if it matches the search criteria
            $(this).toggle(documentoText.indexOf(documentoValue) > -1 && nombreText.indexOf(nombreValue) > -1);
        });
    });
});
}

function agregarEvento(){
    document.addEventListener("DOMContentLoaded", function () {
        // Obtener elementos relevantes
        const btnSiguiente = document.getElementById("btnSiguiente");
        const textoAdicional = document.getElementById("textoAdicional");
        const resultadoPruebaRadios = document.querySelectorAll('input[name="resultadoPrueba"]');
    
        // Agregar evento al botón "Siguiente"
        btnSiguiente.addEventListener("click", function () {
            
        });
    
        // Agregar evento para detectar cambios en los botones de radio
        resultadoPruebaRadios.forEach(function (radio) {
            radio.addEventListener("change", function () {
                // Si "Positivo" está seleccionado, muestra el campo de texto adicional; de lo contrario, ocúltalo
                if (radio.value === "Positivo") {
                    textoAdicional.style.display = "block";
                } else {
                    textoAdicional.style.display = "none";
                }
            });
        });
    });
    
}


// script.js
$(document).ready(function() {
    // Función para actualizar el label de acuerdo a los mg de alcohol ingresados
    function actualizarLabel() {
        const mgAlcohol = parseFloat($("#form3Example5").val());

        
        if(mgAlcohol>=0 && mgAlcohol <20){
            $("#gradoAlcoholLabel").text("Grado 0: 0mg - 20 mg - 39 mg");
        }
        else if (mgAlcohol >= 20 && mgAlcohol < 40) {
            $("#gradoAlcoholLabel").text("Grado 0: 20 mg - 39 mg");
        } else if (mgAlcohol >= 40 && mgAlcohol < 100) {
            $("#gradoAlcoholLabel").text("Grado 1: 40 mg - 99 mg");
        } else if (mgAlcohol >= 100 && mgAlcohol <= 150) {
            $("#gradoAlcoholLabel").text("Grado 2: 100 mg - 150 mg");
        } else if (mgAlcohol >= 150) {
            $("#gradoAlcoholLabel").text("Grado 3: 150 mg en adelante");
        } else {
            $("#gradoAlcoholLabel").text("");
        }
    }

    // Llama a la función actualizarLabel cuando el valor del campo cambie
    $("#form3Example5").on("input", actualizarLabel);
});









