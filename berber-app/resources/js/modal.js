// Get modal element
var modal = document.getElementById('simpleModal');


// Get open modal button
const modalBtn = document.getElementsByClassName('appointment-button');

console.log(modalBtn)

for(let i = 0; i < modalBtn.length; i++){
    modalBtn[i].addEventListener("click",function() {
        let selected = this.dataset.emp

        document.querySelector(`#${selected}`).checked = true

        modal.style.display = 'block';
    });
}

//Get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];

//Listen for open click
// modalBtn.addEventListener('click', openModal);

//Listen for close click
closeBtn.addEventListener('click', closeModal);

//Listen for outside click
window.addEventListener('click' , outsideClick);

// Function to open modal
// function openModal(){
//     modal.style.display = 'block';
// }
//function to close modal
function closeModal(){
    modal.style.display = 'none';
}
// Function to close modal if outside click
function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}