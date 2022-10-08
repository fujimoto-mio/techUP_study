var list = document.getElementsByClassName( "list-group-item" );

document.getElementById('change').addEventListener('click', () =>{
    for (let i = 0; i < list.length; i++) {
    let rezult = list[i].textContent
    list[i].textContent = rezult * 10
  };
});
document.getElementById('reset').addEventListener('click', () =>{
    for (let i = 0; i < list.length; i++) {
    list[i].textContent = 100 + i*10
  };
});
