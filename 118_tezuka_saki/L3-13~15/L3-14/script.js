'use strict';

function Clock(){
const now = new Date();
const houre = now.getHours();
const min = now.getMinutes();
const sec = now.getSeconds();
const time = `${houre}:${min}:${sec}`;
console.log(time);
}
setInterval('Clock()',1000);