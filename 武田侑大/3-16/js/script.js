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

console.log(li[0].textContent);

for (let i = 0; i < li.length ; i++) {
   btn1.addEventListener("click",function(){
   let test2 = li[0].textContent
    li.textContent = test2 * 10

});

}
