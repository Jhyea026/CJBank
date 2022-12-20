
const sugestion_buttons = document.querySelectorAll(".suggestions-buttons");
console.log(sugestion_buttons);
sugestion_buttons.forEach(
    (e) => {e.addEventListener("click", () => addToInput(e.innerHTML))});


function addToInput(value){
    var input_value = document.querySelector("#input-value");
    input_value.value = parseInt(input_value.value) + parseInt(value);
}