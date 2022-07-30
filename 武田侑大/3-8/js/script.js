console.log("XXを関数で確認します");

const check1 = function(number) {
  return number >= 4
};
if (check1(5)) {
  console.log("値は４以上です。");
} else {
  console.log("値は４未満です。");
}

const check2 = function(number) {
  return number <= 10
};
if (check2(5)) {
  console.log("値は１０以上です。");
} else {
  console.log("値は１０未満です");
}
