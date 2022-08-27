class Triple {
   static customName = 'Tripler';//<-④
   static description = 'I triple any number you provide';//<-①

 /* 3をかけるスタティック関数  */
   static calculate(n = 1) {
     return n * 3;
   }
 }

 /*
 *  SquaredTriple
 *  Tripleを継承して計算する子クラス
 */
 class SquaredTriple extends Triple {
   static longDescription;
   static description = 'I square the triple of any number you provide';
   static calculate(n) {//<-③
     return super.calculate(n) * super.calculate(n);//<-親の関数(calculate)を呼び出している
   }
 }

 console.log(Triple.description);//①を表示
 console.log(Triple.calculate(6));//②の関数を計算して表示

 const tp = new Triple();//Triple宣言
 console.log(SquaredTriple.calculate(3));//③の関数
 console.log(SquaredTriple.customName);//④を読んでいる




const example1 = newFunction();
 let myExample = new example1();
 console.log(myExample.name);

  const Who = newFunction_2()

  function newFunction() {
    return function Who(name) {
      this.name = "tanaka";
    };
  }

  newFunction_1();
function newFunction_2() {
  return function (name) {
    this.name = "tanaka";
  };
}

function newFunction_1() {
  Who.prototype.getName = function () {
    return this.name;
  };
  let who1 = new Who();
  console.log(who1.getName());
}



