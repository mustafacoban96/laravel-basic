

const toggleBtn = document.querySelector('#toggle-btn');
const item = document.querySelector('.header-icon-list');
console.log(toggleBtn.children[0].className);

document.addEventListener("click",function(e){
    e.stopPropagation();    
    if(item.style.display == 'flex'){
        item.style.display = 'none';
        toggleBtn.children[0].className = 'fa fa-bars';
    }
},false);
toggleBtn.addEventListener('click', function(e){ 
    if(item.style.display == 'flex'){
        item.style.display = 'none';
        toggleBtn.children[0].className = 'fa fa-bars';
    }
    
    else{
        item.style.display = 'flex';
        toggleBtn.children[0].className = 'fa fa-close';
        console.log(toggleBtn.children);
    }

    e.stopPropagation();
});










