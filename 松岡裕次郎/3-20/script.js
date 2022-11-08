const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.arc(100, 75, 50, 0, 1.5 * Math.PI);
ctx.stroke();
