var User = function() {};
var Member = function() {};
 
User.prototype.hello = function() {
    return 'こんにちは！';
}

Member.prototype = new User();

var tanaka = new User();
var hanako = new Member();
 
console.log( tanaka.hello() );
console.log( hanako.hello() );