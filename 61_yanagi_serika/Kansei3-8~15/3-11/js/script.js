var input = ['a','b','c'];
 
console.log("input:[" + '"' + input + ']' );


var result = ['a','b','c'].map(function( value ) {

    return value + '_set';

});

console.log( "output:["+ result +"]");
