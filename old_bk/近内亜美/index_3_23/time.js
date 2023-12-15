'use strict'

 function countdown (due) {

  const now = new Date();
  const rest = due.getTime() - now.getTime();
  const sec = Math.floor(rest / 1000 % 60);
  const min = Math.floor(rest / 1000 / 60) % 60;
  const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
  const days = Math.floor(rest / 1000 / 60 / 60 / 24);
  const months = Math.floor(rest / 1000 / 60 / 60 / 24 / 30);
  const count = [months, days, hours, min, sec];

  return count;
}

const goal = new Date();

goal.setMonth(11);
goal.setDate(31);
goal.setHours(23);
goal.setMinutes(59);
goal.setSeconds(59); 


const recalc = function () {
  const counter = countdown(goal);
  document.getElementById('day').textContent = counter[1];
  document.getElementById('hour').textContent = counter[2];
  document.getElementById('min').textContent = String(counter[3]).padStart(2,'0');
  document.getElementById('sec').textContent = String(counter[4]).padStart(2,'0');

  refresh();
}

function refresh () {
  setTimeout(recalc, 1000);
}

recalc(); 
  
