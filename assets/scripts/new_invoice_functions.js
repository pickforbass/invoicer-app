const tableBody = document.getElementById('table-body');
const addRow = document.getElementById('add-row');
let rows = tableBody.getElementsByTagName('tr');
let index = rows.length;
let designations = document.getElementsByClassName('designation-name');
let prices = document.getElementsByClassName('designation-price');
let prototype;

index === 0 ? index = 1 : index = rows.length;

function newRow(){

    //Get Prototype
    prototype = tableBody.dataset.prototype;

    // Changing div to tr
    prototype = prototype.replace('<div', '<tr');
    let strReverse = prototype.split('').reverse().join('');
    strReverse = strReverse.replace('>vid', '>rt');
    prototype = strReverse.split('').reverse().join('');

    labelEraser(prototype);

    divToTd(prototype);

    putIndex(prototype);

    insertTd(prototype);

    tableBody.innerHTML += prototype;

}


function labelEraser(sentence) {
    let label = "<label";
    let endLabel = "</label>";

    if (sentence.includes(label) || sentence.includes(endLabel)) {
        let start = sentence.indexOf(label);
        let end = sentence.indexOf(endLabel);

        let toDelete = sentence.slice(start, end + endLabel.length);

        let newSentence = sentence.replace(toDelete, '');
        prototype = newSentence;
        labelEraser(newSentence);
    }
}

function divToTd(sentence){
    sentence = sentence.replaceAll('<div>','<td>');
    prototype = sentence;

}

function putIndex(sentence){

    prototype = sentence.replaceAll('__name__',index);
    index++;
}

function insertTd(sentence){
    let hourTd = document.createElement('td');
    let feeTd = document.createElement('td');
    let hourInput = document.createElement('input');
    let feeInput = document.createElement('input');

    hourTd.append(hourInput);
    feeTd.append(feeInput);
}

newRow();

addRow.addEventListener("click", newRow);

