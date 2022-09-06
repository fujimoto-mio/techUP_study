const btn1 = document.getElementById("change");
const output = document.getElementById("output");

const output2 = document.getElementsByClassName("list-group-item")


 console.log(output.length);

   btn1.addEventListener("click",function(){
   let test = output.textContent
    output.textContent = test * 2

});






//for (let i = 0; i < item.length ; i++) {
  //  (function(n) {
   //      btn1[n].addEventListener('click', () => {
    //        item.innerText = n * 10
     
   // })

//});

//}
