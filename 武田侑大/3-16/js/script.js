const btn1 = document.getElementsByClassName("change");
const btn2 = document.getElementsByClassName('reset');
const item = document.getElementsByClassName('list-group-item');

console.log(item)

for (let i = 0; i < item.length ; i++) {
    (function(n) {
         btn1[n].addEventListener('click', () => {
        item = n * 10
     
    })

});

}
