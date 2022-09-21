 var who = function(name) {
    this.name = name;
 }

 var obj = new who("tanaka");
console.log( obj );

who.prototype.getName = function() {
    return this.name;
}

  var obj = new who("tanaka");
  console.log( obj );
