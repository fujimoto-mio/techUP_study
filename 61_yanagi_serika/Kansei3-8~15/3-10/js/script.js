const names = ["山田さん","佐藤さん" ,"内田さん" ,];
 console.log("最初に配列の値を表示します。");
 console.log(...names);

 console.log("配列の値を１つ消します。");
 const shiftExample=names.shift();
 console.log(shiftExample);

 console.log("残りを表示します。");
 names.splice(1,0);
 console.log(names);