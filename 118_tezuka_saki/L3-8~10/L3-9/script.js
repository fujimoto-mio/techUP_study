'use strict';
const count = [];

for( let i = 1; i <= 10; i++){
    count.push( ()=>{
        console.log(i);
    });
    count[i-1]();
}
