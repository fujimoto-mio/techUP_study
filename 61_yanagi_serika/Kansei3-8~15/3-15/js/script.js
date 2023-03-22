
 
 
 
 class Who {
    constructor(name){
        this.name = name
        console.log(this.name);
    }
 }

 Who.prototype = {
    getName: function() {
        return this.name;
    }
 }

 var tanaka =  new Who("田中");
 console.log(this.name);
