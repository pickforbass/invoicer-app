const modifyButton = document.getElementById('modify');
const inputs = document.querySelectorAll("input[disabled= 'true']");
const hiddens = document.getElementsByClassName('hidden');

console.log(hiddens);


modifyButton.addEventListener('click', function () {
    inputs.forEach(input => input.removeAttribute('disabled'))

    for (let hidden of hiddens) {
        hidden.classList.remove('hidden');
    }
});

