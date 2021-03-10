const tableBody = document.getElementById('table-body');
let firstRow = document.getElementById("new_invoice_designation___name__");
const prototype = firstRow.outerHTML;
const addRow = document.getElementById('add-row');
let index = tableBody.rows.length;


//Set new data-prototype by the first tr
tableBody.setAttribute('data-prototype',prototype);

// changing all __name__ into index number

function putIndex(tr){

    let content = tr.outerHTML.replaceAll('__name__', index.toString());
    return tr.outerHTML = content;

}

putIndex(firstRow);




//
// index === 0 ? index = 1 : index = rows.length;
//
// function newRow(){
//
//     //Get Prototype
//     prototype = tableBody.dataset.prototype;
//
//     // Changing div to tr
//     prototype = prototype.replace('<div', "<tr class='row'");
//     let strReverse = prototype.split('').reverse().join('');
//     strReverse = strReverse.replace('>vid', '>rt');
//     prototype = strReverse.split('').reverse().join('');
//
//     labelEraser(prototype);
//
//     prototype = divToTd(prototype);
//
//     prototype = insertMoreTd(prototype);
//
//     prototype = putIndex(prototype);
//
//     tableBody.innerHTML += prototype;
//
// }
//
//
// function labelEraser(sentence) {
//     let label = "<label";
//     let endLabel = "</label>";
//
//     if (sentence.includes(label) || sentence.includes(endLabel)) {
//         let start = sentence.indexOf(label);
//         let end = sentence.indexOf(endLabel);
//
//         let toDelete = sentence.slice(start, end + endLabel.length);
//
//         let newSentence = sentence.replace(toDelete, '');
//         prototype = newSentence;
//         labelEraser(newSentence);
//     }
// }
//
// function divToTd(sentence){
//     sentence = sentence.replaceAll('<div>','<td>');
//     return sentence.replaceAll('</div>','</td>');
// }
//
//
// function insertMoreTd(sentence){
//     let hourTd = document.createElement('td');
//     let feeTd = document.createElement('td');
//     let hourInput = document.createElement('input');
//     let feeInput = document.createElement('input');
//
//     hourInput.setAttribute('name', 'hour___name__');
//     hourInput.setAttribute('id', 'designation_hour___name__');
//     feeInput.setAttribute('name', 'fee___name__');
//     feeInput.setAttribute('id', 'designation_fee___name__');
//
//     hourTd.append(hourInput);
//     feeTd.append(feeInput);
//
//
//     let start = sentence.indexOf('</td>')+'</td>'.length;
//     return sentence.slice(0, start)+hourTd.outerHTML+feeTd.outerHTML+sentence.slice(start, sentence.length);
// }
//
// newRow();
//
// addRow.addEventListener("click", newRow);


// // *************************************************************************************** //
//
//
// let designationCollection = $("[id^='new_invoice_designation']");
//
// designationCollection.each(function() {
//     let feeInput = $("[name^='fee_']");
//     let option = $(this).find(':selected');
//     console.log(option);
// })

