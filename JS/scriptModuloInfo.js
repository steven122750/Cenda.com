
crearTablaCompleta();


function crearTablaCompleta() {
  $(document).ready(function () {
    // Clona la tabla original y almacénala en una variable
    var tablaCompleta = $("#tablaFuncionariosInfo").clone();

    $("#documentoInput, #nombreInput, #sedeSelect").on("keyup change", function () {
      var documentoValue = $("#documentoInput").val().toLowerCase();
      var nombreValue = $("#nombreInput").val().toLowerCase();
      var sedeValue = $("#sedeSelect").val().toLowerCase();

      $("#tablaFuncionarios").remove();
      $(".table-container").append(tablaCompleta);

      // Filtra la nueva tabla basada en los valores de búsqueda
      $("table tbody tr").filter(function () {
        var documentoText = $(this).find("td:eq(2)").text().toLowerCase();
        var nombreText = $(this).find("td:eq(1)").text().toLowerCase();
        var sedeText = $(this).find("td:eq(0)").text().toLowerCase();

        var showRow = (
          documentoText.indexOf(documentoValue) > -1 &&
          nombreText.indexOf(nombreValue) > -1 &&
          (sedeValue === "Buscar por sede" || sedeText.indexOf(sedeValue) > -1)
        );

        // Añade una condición adicional para mostrar todas las filas si "Buscar por sede" está seleccionado
        if (sedeValue === "Buscar por sede") {
          showRow = true;
        }

        $(this).toggle(showRow);
      });
    });
  });
}


var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  
  return function(table, name, sede) {
      if (!table.nodeType) table = document.getElementById(table);
      var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML};
  
      if (sede && sede !== "Buscar por sede") {
          var sedeIndex = $(table).find("thead th:contains('Sede')").index();
          var pruebaColumnIndex = $(table).find("thead th:contains('Prueba de alcoholemia')").index();
          var rowsToExport = [];
          var headerRow = $(table).find("thead tr").clone();
          headerRow.find("th:eq(" + pruebaColumnIndex + ")").remove();
          rowsToExport.push(headerRow[0].outerHTML);
          $(table).find("tbody tr").each(function() {
              var rowData = $(this).find("td").eq(sedeIndex).text().toLowerCase();
              if (rowData === sede.toLowerCase()) {
                  var dataRow = $(this).clone();
                  dataRow.find("td:eq(" + pruebaColumnIndex + ")").remove();
                  rowsToExport.push(dataRow[0].outerHTML);
              }
          });
          ctx.table = rowsToExport.join('');
      }
      
      window.location.href = uri + base64(format(template, ctx));
  }
})();

