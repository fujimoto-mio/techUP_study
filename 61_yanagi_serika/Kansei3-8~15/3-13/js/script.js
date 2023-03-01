const saikoro = document.getElementById("saikoro");


function sainome(){
const nmb = Math.floor(Math.random()*6 + 1);
saikoro.innerHTML = nmb; 
}


saikoro.addEventListener("click", sainome, false);