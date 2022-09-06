const btn1 = document.getElementById("change");
const output = document.getElementById("output");

console.log(output.textContent);



   btn1.addEventListener("click",function(){
   let test = output.textContent
    output.textContent = test * 2

});

///////////////////////////////////////////////////

let output2 = document.getElementsByClassName("list-group")
let li = document.getElementsByClassName("list-group-item")

console.log(li.textContent);

   btn1.addEventListener("click",function(){
   let test2 = li.text()
    li.textContent = test2 * 2

});




//for (let i = 0; i < item.length ; i++) {
  //  (function(n) {
   //      btn1[n].addEventListener('click', () => {
    //        item.innerText = n * 10
     
   // })

//});

//}
