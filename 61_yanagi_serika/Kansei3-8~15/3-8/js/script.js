let x = 4;
let y = 10;

if(x>=4){
    console.log("値は４以上です。");
}else{
    console.log("値は４未満です。");
}

if(x>=10){
    console.log("値は10以上です。");
}else{
    console.log("値は10未満です。");
}


function sm(){
    return x + y + 5;
}

console.log(sm());