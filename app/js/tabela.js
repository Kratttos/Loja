
function filtrotabela() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function encontrarcd(){
  // Track onclicks on all td elements
var table = document.getElementsByTagName("table")[0];
// Get all the rows in the table
var rows = table.getElementsByTagName("tr");

for (var i = 0; i < rows.length; i++) {
    //Get the cells in the given row
    var cells = rows[i].getElementsByTagName("td");
    for (var j = 0; j < cells.length; j++) {
        // Cell Object
        var cell = cells[j];
        cell.rowIndex = i;
        cell.positionIndex = j;
        cell.totalCells = cells.length;
        cell.totalRows = rows.length;
        // Track with onclick
        console.log(cell);
        cell.onclick = function () {
            alert("I am in row " + this.rowIndex + " (out of " + this.totalRows + " rows) and I am position " + this.positionIndex + " (out of " + this.totalCells + " cells)");
        };
    }
}
}
