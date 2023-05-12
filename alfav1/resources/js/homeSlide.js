const picture = document.querySelector('.slide-part');
const dotArea = document.querySelector('.dot-area');
const nextButton = document.querySelector('.next');
const prevButton = document.querySelector('.prev');


const slideLength = picture.children.length-1;

// dot
for(var j = 0; j<slideLength ; j++){
        const dot = document.createElement('span');
        dot.className = 'dot';
        dotArea.appendChild(dot);
}

// Slide show
var slaytNo = 0;
var i = 0;
showSlide(slaytNo);



function nextSlide(){
    slaytNo++;
    if(slaytNo > slideLength-1){
        slaytNo = 0;
    }
    
    showSlide(slaytNo);
}
function previousSlide(){
    slaytNo--;
    if(slaytNo <0){
        slaytNo = slideLength-1;
    }
    
    showSlide(slaytNo);
}


nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click',previousSlide);
const dots = document.querySelectorAll('.dot');

// get current index number of the dot 
function getSlideNumber(){
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function(){
            showSlide(index);
        });
      });
}
getSlideNumber();

// Silde show func
function showSlide(slideNo){
    slaytNo = slideNo;

    if(slaytNo >= slideLength){
        slaytNo = 0;
    }
    if(slaytNo < 0){
        slaytNo = slideLength - 1;
    }

    for(i = 0; i < slideLength; i++){
        picture.children[i].style.display = 'none';
        dotArea.children[i].style.backgroundColor= '#fff';
    }

    picture.children[slideNo].style.display = 'flex';
    dotArea.children[slideNo].style.backgroundColor = 'var(--orange)';
    
}
































// let slideIndex = 1;
// picture.children[slideIndex-1].style.display = "flex";
// dotArea.children[slideIndex-1].style.backgroundColor = 'var(--orange)';
// function chSlide(){
//     let i;
//     for(i = 0; i<picture.children.length; i++){
//         if(picture.children[i].className == 'slide'){
//             picture.children[slideIndex].style.display = "flex";
//             dotArea.children[slideIndex].style.backgroundColor = 'var(--orange)';
//             if( i != slideIndex){
//                 dotArea.children[i].style.backgroundColor = '#fff';
//                 picture.children[i].style.display = "none";
//             }
//         }
//     }
   
//     slideIndex++;
    
//     if(slideIndex >= picture.children.length-1){
//         slideIndex = 0;
//     }
// }
// nextButton.addEventListener('click',chSlide);










