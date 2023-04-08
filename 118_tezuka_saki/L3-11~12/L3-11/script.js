'use strict';
let items = ["a","b","c"];

let result = items.map( function(value){
    return [value] + "_set";
}
);

console.log(result);