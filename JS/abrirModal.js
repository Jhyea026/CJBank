const openModalButton = document.querySelector("#open-modal");
const closeModalButton = document.querySelector("#close-modal");

const openPixModal = document.querySelectorAll(".pixModal");
const closePixModal = document.querySelector("#closePixModal");

const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

const modal2 = document.querySelector("#modal2");
const fade2 = document.querySelector("#fade2");

openModalButton.style.cursor = 'pointer';
closeModalButton.style.cursor = 'pointer';
closePixModal.style.cursor = 'pointer';

const toggleModal = () => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
}

const toggleModalTrans =() => {
    modal2.classList.toggle("hide");
    fade2.classList.toggle("hide");
}

[openModalButton, closeModalButton, fade].forEach((e1) => {
    e1.addEventListener("click", () => toggleModal());
})

openPixModal.forEach(
    (e) => {
        e.style.cursor = 'pointer';
        e.addEventListener("click", ()=>{toggleModalTrans()})
})

closePixModal.addEventListener("click", ()=>{toggleModalTrans()})

fade2.addEventListener("click", ()=>{toggleModalTrans()})