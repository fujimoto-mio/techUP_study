//要素取得
const saikoro = document.getElementById("saikoro");

//サイの目
function sainome(){
const nmb = Math.floor(Math.random()*6 + 1);
saikoro.innerHTML = nmb; 
}

//クリックイベント


document.addEventListener('click', sainome, false);