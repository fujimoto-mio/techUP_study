const canvas = document.createElement('canvas');
const context = canvas.getContext('2d');
canvas.width = 500;
canvas.height = 500;
document.body.appendChild(canvas);

const centerX = 250;
const centerY = 250;

const distanceFromCenter = 100;

const circleSize = 40;

let x = centerX;
let y = centerY;
let angleRad = 0;

function loop(timestamp) {
  context.clearRect(0, 0, canvas.width, canvas.height);

  angleRad += 1 * Math.PI / 180;

  x = distanceFromCenter * Math.cos(angleRad) + centerX;
  y = distanceFromCenter * Math.sin(angleRad) + centerY;

  context.beginPath();
  context.arc(x, y, circleSize, 0, Math.PI * 2);
  context.fill();

  window.requestAnimationFrame(loop);
}

window.requestAnimationFrame(loop);
