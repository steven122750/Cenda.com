
agregarEvento();

function agregarEvento() {
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
$(document).ready(function () {
    // Función para actualizar el label de acuerdo a los mg de alcohol ingresados
    function actualizarLabel() {
        const mgAlcohol = parseFloat($("#form3Example5").val());


        if (mgAlcohol >= 0 && mgAlcohol < 20) {
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











