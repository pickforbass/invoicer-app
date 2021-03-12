const tableBody = document.getElementById('table-body');
let firstRow = document.getElementById("new_invoice_designation___name__");
const prototype = firstRow.outerHTML;
const addRow = document.getElementById('add-row');
let index = tableBody.rows.length;

// Changing first row

firstRow.outerHTML = prototype.replaceAll('__name__', index.toString());
settingFeeInput();
index++;

function insertRow(){
    //insert index
    let newRow = prototype.replaceAll('__name__', index.toString());

    //insert new row
    tableBody.innerHTML+=newRow;
    settingFeeInput();

    // increment index
    index++;
}

function settingFeeInput() {
    let select = document.getElementById("new_invoice_designation_"+index+"_designation");
    let fee = document.getElementById("new_invoice_designation_"+index+"_fee");
    console.log(select);

    select.addEventListener('change', ()=> {
            fee.value = select.value;
        });
}

addRow.addEventListener('click', insertRow);

