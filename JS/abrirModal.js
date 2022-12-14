const openModalButton = document.querySelector("#open-modal");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

openModalButton.style.cursor = 'pointer';
closeModalButton.style.cursor = 'pointer';

const toggleModal =() => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
}

[openModalButton, closeModalButton, fade].forEach((e1) => {
    e1.addEventListener("click", () => toggleModal());
})