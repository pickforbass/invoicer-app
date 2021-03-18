const tableBody = document.getElementById('table-body');
let firstRow = document.getElementById("new_invoice_designations___name__");
const prototype = firstRow.outerHTML;
const addRow = document.getElementById('add-row');
let index;

// Changing first row
firstRow.outerHTML = prototype.replaceAll('__name__', tableBody.rows.length.toString());
settingFeeInput();

function insertRow(){
    index = tableBody.rows.length;
    //insert index
    let newRow = prototype.replaceAll('__name__', index.toString());

    //insert new row
    tableBody.innerHTML+=newRow;
    settingFeeInput();
}

function settingFeeInput() {
    let select = document.getElementById("new_invoice_designations_"+index+"_designation");
    let fee = document.getElementById("new_invoice_designations_"+index+"_fee");

    select.addEventListener('change', ()=> {
        fee.value = select.value;
    });
}

addRow.addEventListener('click', insertRow);

