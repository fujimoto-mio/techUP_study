var count = 0;
window.onload = function () {

    function event() {
      var now = new Date();
      var hour = now.getHours();
      var minute = now.getMinutes();
      var second = now.getSeconds();
      if ( hour < 10 ) hour = "0" + hour;
      if ( minute < 10 ) minute = "0" + minute;
      if ( second < 10 ) second = "0" + second;
      
      console.log(hour+":"+minute+":"+second);
      count++;
      if(count >200){
        clearInterval(timer);
      }
    }
   
    timer = setInterval(event, 1000);
}
