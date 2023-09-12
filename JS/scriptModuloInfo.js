
filtrarTabla();


function filtrarTabla() {
  $(document).ready(function () {
      $("#documentoInput, #nombreInput, #sedeSelect").on("keyup change", function () {
          var documentoValue = $("#documentoInput").val().toLowerCase();
          var nombreValue = $("#nombreInput").val().toLowerCase();
          var sedeValue = $("#sedeSelect").val().toLowerCase();
  
          $("table tbody tr").filter(function () {
              var documentoText = $(this).find("td:eq(2)").text().toLowerCase();
              var nombreText = $(this).find("td:eq(1)").text().toLowerCase();
              var sedeText = $(this).find("td:eq(0)").text().toLowerCase();
              
              // Show the row if it matches the search criteria
              $(this).toggle(
                  documentoText.indexOf(documentoValue) > -1 &&
                  nombreText.indexOf(nombreValue) > -1 &&
                  (sedeValue === "Cenda Armenia" || sedeText.indexOf(sedeValue) > -1)
              );
          });
      });
  });
}

  
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
          , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
          , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
          , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
          if (!table.nodeType) table = document.getElementById(table)
          var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
          window.location.href = uri + base64(format(template, ctx))
        }
      })()