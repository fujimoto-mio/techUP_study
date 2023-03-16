//課題１
class User {
    constructor(tanaka) {
      this.tanaka = tanaka;
      
    }
  
    // インスタンスメソッドを定義
    method(String) {
      this.String = String;
    }
  }
  
  // インスタンス化
  const instance = new User('tanaka');
  
  // インスタンスメソッドを実行
  instance.method('String');
  console.log(instance.tanaka,) 



//課題２
  var Who = function() {};
 
Who.prototype.getName = function() {
    return '田中';
}

 
var tanaka = new Who();

console.log( tanaka.getName());