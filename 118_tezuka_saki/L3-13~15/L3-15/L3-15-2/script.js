'use strict';
class who{
    constructor(name){
        this.name = name
    }
}

who.prototype.getName = function(){
    return this.name;
}

let user = new who('tanaka');

console.log(user.getName());