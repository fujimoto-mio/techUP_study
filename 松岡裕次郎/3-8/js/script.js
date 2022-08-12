console.log("XXを関数で確認します。");

var value0 = function(number){
  return number >=4
};
if (value0(5)) {
  console.log("値は４以上です。");
} else{
  console.log("値は４未満です。");
}

var value1 = function(number){
  return number <=10
};
if (value1(5)) {
  console.log("値は10未満です。");
} else{
  console.log("値は10以上です。");
};