function add() {

  const button = document.getElementById('btn');
  const text = document.getElementById('textbox');

  button.addEventListener('click', (event) => {
    text.value++;
  })

}
add();