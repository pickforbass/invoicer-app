const tableBody = document.getElementById('table-body');
let firstRow = document.getElementById("new_invoice_designation___name__");
const prototype = firstRow.outerHTML;
const addRow = document.getElementById('add-row');
let index = tableBody.rows.length;

// Changing first row

firstRow.outerHTML = prototype.replaceAll('__name__', index);
index++;


function insertRow(){
    //insert index
    let newRow = prototype.replaceAll('__name__', index);
    // increment index
    index++;
    //insert new row
    tableBody.innerHTML+=newRow;
}
addRow.addEventListener('click', insertRow);

