const productImg = document.querySelector('.product-small-image');
const productImgLength = productImg.children.length;
const productSmallImg = document.querySelectorAll('#small-picture');
const productBıgImg = document.querySelector("#big-image");
const nextPButton = document.querySelector('#next');
const previousPButton = document.querySelector('#prev');

console.log(productImgLength);
//console.log(nextPButton);
//console.log(productImg.children);
// console.log(productBıgImg);
// console.log(productSmallImg[0].src);
// productBıgImg.src = productSmallImg[2].src;


/////////////////////////////////////////////
var slideNumber = 0;
var i = 0;

showProductSlide(slideNumber);

function nextPSlide(){
    slideNumber++;
    if(slideNumber >productImgLength-1){
        slideNumber = 0;
    }
    
    showProductSlide(slideNumber);
}
function previousPSlide(){
    slideNumber--;
    if(slideNumber <0){
        slideNumber = productImgLength-1;
    }
    showProductSlide(slideNumber);
}

nextPButton.addEventListener('click', nextPSlide);
previousPButton.addEventListener('click',previousPSlide);


function getSlideNumber(){
    productSmallImg.forEach((image, index) => {
        image.addEventListener('click', function(){
            showProductSlide(index);
        });
      });
}
getSlideNumber();



function showProductSlide(slideNum){
    slideNumber = slideNum;
    if(slideNumber >= productImgLength){
        slideNumber = 0;
    }
    if(slideNumber < 0){
        slideNumber = productImgLength - 1;
    }

    for(i = 0; i < productImgLength; i++){
        productImg.children[i].style.borderColor = "#fff";
    }
    productBıgImg.src = productSmallImg[slideNum].src;
    productImg.children[slideNum].style.borderColor = "var(--orange)";
}














