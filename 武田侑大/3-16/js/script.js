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
            
           li[0].textContent = 100;
           li[1].textContent = 110;
           li[2].textContent = 120;
           li[3].textContent = 130;
           li[4].textContent = 140;
            }
});