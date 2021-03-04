let feeInputs = $("[id^='designation_fee']");

let taskCollection = $("[id='new_invoice_designation_1_designation']").children();
let taskArray = [];

taskCollection.each(function() {
    taskArray.push($(this).text());
})

console.log(taskArray);


feeInputs.each(function () {
    $(this).data('fee', 50);

    $(this).val($(this).data('fee'));
})

