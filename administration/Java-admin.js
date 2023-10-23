const monInput = document.querySelector('[data-input-image]')
const monImage = document.querySelector('[data-image]')
monInput.addEventListener("blur",  function (evt) {
    monImage.src = evt.target.value;
});