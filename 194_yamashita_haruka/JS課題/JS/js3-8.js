alert("XXを関数で確認します");

let item = 5;

//１つ目の関数task1()
function task1(){
  if (item >= 4){
    console.log("値は４以上です。");
  }else{
    console.log("値は４未満です。");
  }
}

//２つ目の関数task2()
function task2(){
  if (item >= 10){
    console.log("値は10以上です。");
  }else{
    console.log("値は10未満です。");
  }
}

//関数呼び出し
task1();
task2();


