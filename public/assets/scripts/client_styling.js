const modifyButton = document.getElementById('modify');
const inputs = document.querySelectorAll("input[disabled= 'true']");
const hiddens = document.getElementsByClassName('hidden');

console.log(hiddens);


modifyButton.addEventListener('click',  () => {
    inputs.forEach(input => input.removeAttribute('disabled'));
    Array.from(hiddens).forEach(item => {
       item.classList.remove('hidden');
    });
});

