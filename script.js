const needs_validation = document.getElementsByClassName('needs-validation')[0];
const info = document.getElementsByClassName('btn-outline-info');
needs_validation.style.display =  'none';

for(let i = 0; i<info.length; i++){
    info[i].addEventListener('click', function(){
        needs_validation.style.display = 'flex';
        if(needs_validation.style.display = 'flex'){
            info[i].addEventListener('click', function(){
                needs_validation.style.display = 'none';
                
            })
        }
    })
}

