'use strict';
'use strict';
let img = new Image();
img.src = "https://techup.tokyo/wp-content/uploads/2022/05/gosticon.png";

const canvas = document.getElementById('cvs');
const ctx = canvas.getContext('2d');

//中心座標
const CEN_X = 200;
const CEN_Y = 200;
const radius = 150;

let angle = 0;

function circle(fig){
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    angle += 1 * Math.PI/180;
    let x = radius * Math.cos(angle) + CEN_X;
    let y = radius * Math.sin(angle) + CEN_Y;

    ctx.beginPath();
    ctx.drawImage(img,0,0,500,500,x,y,50,50);
    ctx.fill();
    
    window.requestAnimationFrame(circle);
}

window.requestAnimationFrame(circle);