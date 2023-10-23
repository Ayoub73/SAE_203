const banniere = document.querySelector("[data-banniere]");
const btnFermetureBanniere = document.querySelector("[data-fermeture-banniere]");
btnFermetureBanniere.addEventListener("click", function () {
    banniere.classList.add('cache')
});

const monInput = document.querySelector('[data-input-image]')
const monImage = document.querySelector('[data-image]')
monInput.addEventListener("blur",  function (evt) {
    monImage.src = evt.target.value;
});




