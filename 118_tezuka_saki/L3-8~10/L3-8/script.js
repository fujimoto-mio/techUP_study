'use strict';
console.log("XXを関数で確認します");
function judge1(num){
    if (num>=4){
        return "値は４以上です。";
    }else if(num<4){
        return "値は４未満です。";
    }
}
console.log(judge1(5));

function judge2(num){
    if (num>=10){
        return "値は１０以上です。";
    }else if(num<10){
        return "値は１０未満です。";
    }
}
console.log(judge2(5));