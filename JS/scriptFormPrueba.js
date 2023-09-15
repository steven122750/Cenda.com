
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