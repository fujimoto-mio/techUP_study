'use strict';

const button = document.getElementById('btn');
const input = document.getElementById('hoge');
const message = document.querySelector('p');

button.addEventListener('click', () => {
  input.value = +input.value + 1 ; // +記号で数値に変換し、1を加算
  message.innerHTML = 'ボタン稼働時';//初期値からボタン稼働時へ変更
});