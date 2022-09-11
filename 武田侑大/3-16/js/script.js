let btn1 = document.getElementById("change");
let btn2 = document.getElementById("reset");
let li = document.getElementsByClassName("list-group-item");



   btn1.addEventListener("click",function(){
      for (let i = 0; i < li.length ; i++) { 
            let test = li[i].textContent ;
            li[i].textContent = test * 10 ;
            
            }
});

    
    
    btn2.addEventListener("click",function(){
     
      for (let i = 0; i < li.length ; i++) { 
           
           v = 100;
           li[0].textContent = v ;
           li[1].textContent = v + 10;
           li[2].textContent = v + 20;
           li[3].textContent = v + 30;
           li[4].textContent = v + 40;
            }
});