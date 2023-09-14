
$(document).ready(function () {
  // Guardar una copia de la tabla original
  var originalTable = $("table").clone();

  $("#sedeSelectPruebas, #documentoInput, #nombreInput").on("change keyup", function () {
    var sedeValue = $("#sedeSelectPruebas").val().toLowerCase();
    var documentoValue = $("#documentoInput").val().toLowerCase();
    var nombreValue = $("#nombreInput").val().toLowerCase();

    // Clonar la tabla original cada vez que cambian los criterios de búsqueda
    var clonedTable = originalTable.clone();

    // Limpiar la tabla clonada de filas anteriores
    clonedTable.find("tbody tr").remove();

    originalTable.find("tbody tr").each(function () {
      var row = $(this);
      var sede = row.find("td:eq(0)").text().toLowerCase();
      var documento = row.find("td:eq(4)").text().toLowerCase();
      var nombre = row.find("td:eq(3)").text().toLowerCase();

      var sedeMatch = sede.includes(sedeValue);
      var documentoMatch = documento.includes(documentoValue);
      var nombreMatch = nombre.includes(nombreValue);

      if (sedeMatch && documentoMatch && nombreMatch) {
        // Agregar la fila que cumple con los criterios al clon
        clonedTable.find("tbody").append(row.clone());
      }
    });

    // Reemplazar la tabla original con la tabla clonada
    $("table").replaceWith(clonedTable);
  });
});

let filteredRows = []; // Variable global para almacenar las filas filtradas

function filterByDate() {
  // Obtén las fechas de inicio y fin ingresadas por el usuario
  const fechaInicio = document.getElementById("fechaInicio").value;
  const fechaFin = document.getElementById("fechaFin").value;

  // Obtiene todas las filas de la tabla
  const rows = document.querySelectorAll("#tablaRegistros tbody tr");

  filteredRows = []; // Limpiar las filas filtradas

  // Filtrar filas según el rango de fechas y almacenarlas en filteredRows
  rows.forEach((row) => {
    const fechaPrueba = row.cells[1].textContent; // La fecha de prueba está en la segunda columna

    if (fechaPrueba >= fechaInicio && fechaPrueba <= fechaFin) {
      filteredRows.push(row); // Almacena la fila filtrada
      row.style.display = "table-row"; // Muestra la fila
    } else {
      row.style.display = "none"; // Oculta la fila que no cumple con el filtro
    }
  });
}

var tableToExcel = (function () {
  var uri = 'data:application/vnd.ms-excel;base64,',
    template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
    base64 = function (s) {
      return window.btoa(unescape(encodeURIComponent(s)))
    },
    format = function (s, c) {
      return s.replace(/{(\w+)}/g, function (m, p) {
        return c[p];
      })
    }

  return function (tableId, name, sede, fechaInicio, fechaFin) {
    var table = document.getElementById(tableId);
    var ctx = { worksheet: name || 'Worksheet', table: '' };

    if (table) {
      if (sede && sede !== "Buscar por sede" && fechaInicio && fechaFin) {
        var sedeIndex = -1;
        var fechaIndex = -1;
        var headerRow = $(table).find("thead tr").eq(0);
        headerRow.find("th").each(function (index) {
          if ($(this).text().trim() === "Sede") {
            sedeIndex = index;
          }
          if ($(this).text().trim() === "Fecha de prueba") {
            fechaIndex = index;
          }
        });

        var rowsToExport = [];
        var tbodyRows = $(table).find("tbody tr");
        tbodyRows.each(function () {
          var rowDataSede = $(this).find("td").eq(sedeIndex).text().toLowerCase();
          var rowDataFecha = $(this).find("td").eq(fechaIndex).text();
          var fechaPrueba = new Date(rowDataFecha);

          if (
            rowDataSede === sede.toLowerCase() &&
            fechaPrueba >= new Date(fechaInicio) &&
            fechaPrueba <= new Date(fechaFin)
          ) {
            var clonedRow = $(this).clone();
            rowsToExport.push(clonedRow);
          }
        });

        // Crear una nueva tabla con las filas seleccionadas
        var newTable = $("<table></table>").append(headerRow.clone()).append(rowsToExport);

        ctx.table = newTable[0].outerHTML;
      } else {
        // Si no se selecciona una sede, exporta toda la tabla
        ctx.table = table.innerHTML;
      }

      window.location.href = uri + base64(format(template, ctx));
    }
  }
})();

function exportToExcelWithFilters() {
  var sede = document.getElementById("sedeSelectPruebas").value;
  var fechaInicio = document.getElementById("fechaInicio").value;
  var fechaFin = document.getElementById("fechaFin").value;

  tableToExcel('tablaRegistros', 'Registros de pruebas de alcoholemia', sede, fechaInicio, fechaFin);
}
