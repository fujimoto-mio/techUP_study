'use strict';
const canvas = document.getElementById('cvs');
const ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.arc(60, 50 , 50, 0, 1.5 * Math.PI);
ctx.stroke();