'use strict';
let test = [100,110,120,130,140];

document.getElementById('set').addEventListener('click',function(){
    let num = document.querySelectorAll('li').length;
    for(let i = 0; i < num; i++){
        let calculation = document.querySelectorAll('li')[i].textContent;
        document.querySelectorAll('li')[i].textContent = calculation*10;
    }
});

document.getElementById('reset').addEventListener('click',function(){
    let num = test.length;
    for(let i = 0; i < num; i++){
        document.querySelectorAll('li')[i].textContent = test[i];
    }
});