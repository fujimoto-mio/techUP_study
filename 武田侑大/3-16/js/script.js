let btn1 = document.getElementById("change");
let output = document.getElementById("output");

let output2 = document.getElementsByClassName("list-group")
let li = document.getElementsByClassName("list-group-item")


for (let i = 0; i < li.length ; i++) {
  
   btn1.addEventListener("click",function(){
    
      let test2 = li[i].textContent
      li[i].textContent = test2 * 10

});

}
