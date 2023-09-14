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

  return function (tableId, name, sede) {
    var table = document.getElementById(tableId);
    var ctx = { worksheet: name || 'Worksheet', table: '' };

    if (table) {
      if (sede && sede !== "Buscar por sede") {
        var sedeIndex = -1;
        var headerRow = $(table).find("thead tr").eq(0);
        headerRow.find("th").each(function (index) {
          if ($(this).text().trim() === "Sede") {
            sedeIndex = index;
            return false; // Break the loop
          }
        });

        var rowsToExport = [];
        var tbodyRows = $(table).find("tbody tr");
        tbodyRows.each(function () {
          var rowData = $(this).find("td").eq(sedeIndex).text().toLowerCase();
          if (rowData === sede.toLowerCase()) {
            var clonedRow = $(this).clone();
            // Elimina la columna "Editar datos" de la fila clonada
            clonedRow.find("td:last-child").remove(); // Elimina la última columna
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
