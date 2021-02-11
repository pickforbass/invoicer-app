const modifyButton = document.getElementById('modify');
const inputs = document.querySelectorAll("input[disabled= 'true']");

modifyButton.addEventListener('click', function () {
    inputs.forEach(input =>
        input.removeAttribute('disabled')
    )});

